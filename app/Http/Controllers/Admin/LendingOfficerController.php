<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLendingOfficerRequest;
use App\Http\Requests\StoreLendingOfficerRequest;
use App\Http\Requests\UpdateLendingOfficerRequest;
use App\Models\LendingOfficer;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LendingOfficerController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('lending_officer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LendingOfficer::with(['user'])->select(sprintf('%s.*', (new LendingOfficer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lending_officer_show';
                $editGate      = 'lending_officer_edit';
                $deleteGate    = 'lending_officer_delete';
                $crudRoutePart = 'lending-officers';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.lendingOfficers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lending_officer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lendingOfficers.create', compact('users'));
    }

    public function store(StoreLendingOfficerRequest $request)
    {
        $lendingOfficer = LendingOfficer::create($request->all());

        return redirect()->route('admin.lending-officers.index');
    }

    public function edit(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lendingOfficer->load('user');

        return view('admin.lendingOfficers.edit', compact('lendingOfficer', 'users'));
    }

    public function update(UpdateLendingOfficerRequest $request, LendingOfficer $lendingOfficer)
    {
        $lendingOfficer->update($request->all());

        return redirect()->route('admin.lending-officers.index');
    }

    public function show(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lendingOfficer->load('user');

        return view('admin.lendingOfficers.show', compact('lendingOfficer'));
    }

    public function destroy(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lendingOfficer->delete();

        return back();
    }

    public function massDestroy(MassDestroyLendingOfficerRequest $request)
    {
        $lendingOfficers = LendingOfficer::find(request('ids'));

        foreach ($lendingOfficers as $lendingOfficer) {
            $lendingOfficer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
