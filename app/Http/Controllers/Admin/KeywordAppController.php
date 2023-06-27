<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeywordAppRequest;
use App\Http\Requests\StoreKeywordAppRequest;
use App\Http\Requests\UpdateKeywordAppRequest;
use App\Models\KeywordApp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KeywordAppController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('keyword_app_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KeywordApp::query()->select(sprintf('%s.*', (new KeywordApp)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'keyword_app_show';
                $editGate = 'keyword_app_edit';
                $deleteGate = 'keyword_app_delete';
                $crudRoutePart = 'keyword-apps';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('short_name', function ($row) {
                return $row->short_name ? $row->short_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.keywordApps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('keyword_app_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.keywordApps.create');
    }

    public function store(StoreKeywordAppRequest $request)
    {
        $keywordApp = KeywordApp::create($request->all());

        return redirect()->route('admin.keyword-apps.index');
    }

    public function edit(KeywordApp $keywordApp)
    {
        abort_if(Gate::denies('keyword_app_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.keywordApps.edit', compact('keywordApp'));
    }

    public function update(UpdateKeywordAppRequest $request, KeywordApp $keywordApp)
    {
        $keywordApp->update($request->all());

        return redirect()->route('admin.keyword-apps.index');
    }

    public function show(KeywordApp $keywordApp)
    {
        abort_if(Gate::denies('keyword_app_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.keywordApps.show', compact('keywordApp'));
    }

    public function destroy(KeywordApp $keywordApp)
    {
        abort_if(Gate::denies('keyword_app_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywordApp->delete();

        return back();
    }

    public function massDestroy(MassDestroyKeywordAppRequest $request)
    {
        $keywordApps = KeywordApp::find(request('ids'));

        foreach ($keywordApps as $keywordApp) {
            $keywordApp->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
