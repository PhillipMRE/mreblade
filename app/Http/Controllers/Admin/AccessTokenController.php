<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAccessTokenRequest;
use App\Http\Requests\StoreAccessTokenRequest;
use App\Http\Requests\UpdateAccessTokenRequest;
use App\Models\AccessToken;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AccessTokenController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('access_token_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AccessToken::with(['user'])->select(sprintf('%s.*', (new AccessToken)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'access_token_show';
                $editGate      = 'access_token_edit';
                $deleteGate    = 'access_token_delete';
                $crudRoutePart = 'access-tokens';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('ttl', function ($row) {
                return $row->ttl ? $row->ttl : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.accessTokens.index');
    }

    public function create()
    {
        abort_if(Gate::denies('access_token_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.accessTokens.create', compact('users'));
    }

    public function store(StoreAccessTokenRequest $request)
    {
        $accessToken = AccessToken::create($request->all());

        return redirect()->route('admin.access-tokens.index');
    }

    public function edit(AccessToken $accessToken)
    {
        abort_if(Gate::denies('access_token_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accessToken->load('user');

        return view('admin.accessTokens.edit', compact('accessToken', 'users'));
    }

    public function update(UpdateAccessTokenRequest $request, AccessToken $accessToken)
    {
        $accessToken->update($request->all());

        return redirect()->route('admin.access-tokens.index');
    }

    public function show(AccessToken $accessToken)
    {
        abort_if(Gate::denies('access_token_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accessToken->load('user');

        return view('admin.accessTokens.show', compact('accessToken'));
    }

    public function destroy(AccessToken $accessToken)
    {
        abort_if(Gate::denies('access_token_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accessToken->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccessTokenRequest $request)
    {
        $accessTokens = AccessToken::find(request('ids'));

        foreach ($accessTokens as $accessToken) {
            $accessToken->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
