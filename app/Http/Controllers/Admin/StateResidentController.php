<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStateResidentRequest;
use App\Http\Requests\StoreStateResidentRequest;
use App\Http\Requests\UpdateStateResidentRequest;
use App\Models\Board;
use App\Models\StateResident;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StateResidentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('state_resident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StateResident::with(['board'])->select(sprintf('%s.*', (new StateResident)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'state_resident_show';
                $editGate = 'state_resident_edit';
                $deleteGate = 'state_resident_delete';
                $crudRoutePart = 'state-residents';

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
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->addColumn('board_name', function ($row) {
                return $row->board ? $row->board->name : '';
            });

            $table->editColumn('board.name', function ($row) {
                return $row->board ? (is_string($row->board) ? $row->board : $row->board->name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'board']);

            return $table->make(true);
        }

        return view('admin.stateResidents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('state_resident_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stateResidents.create', compact('boards'));
    }

    public function store(StoreStateResidentRequest $request)
    {
        $stateResident = StateResident::create($request->all());

        return redirect()->route('admin.state-residents.index');
    }

    public function edit(StateResident $stateResident)
    {
        abort_if(Gate::denies('state_resident_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stateResident->load('board');

        return view('admin.stateResidents.edit', compact('boards', 'stateResident'));
    }

    public function update(UpdateStateResidentRequest $request, StateResident $stateResident)
    {
        $stateResident->update($request->all());

        return redirect()->route('admin.state-residents.index');
    }

    public function show(StateResident $stateResident)
    {
        abort_if(Gate::denies('state_resident_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stateResident->load('board');

        return view('admin.stateResidents.show', compact('stateResident'));
    }

    public function destroy(StateResident $stateResident)
    {
        abort_if(Gate::denies('state_resident_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stateResident->delete();

        return back();
    }

    public function massDestroy(MassDestroyStateResidentRequest $request)
    {
        $stateResidents = StateResident::find(request('ids'));

        foreach ($stateResidents as $stateResident) {
            $stateResident->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
