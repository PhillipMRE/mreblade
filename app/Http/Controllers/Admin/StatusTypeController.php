<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStatusTypeRequest;
use App\Http\Requests\StoreStatusTypeRequest;
use App\Http\Requests\UpdateStatusTypeRequest;
use App\Models\Board;
use App\Models\StatusType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StatusTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('status_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StatusType::with(['board'])->select(sprintf('%s.*', (new StatusType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'status_type_show';
                $editGate = 'status_type_edit';
                $deleteGate = 'status_type_delete';
                $crudRoutePart = 'status-types';

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
            $table->editColumn('listing_status', function ($row) {
                return $row->listing_status ? $row->listing_status : '';
            });
            $table->addColumn('board_name', function ($row) {
                return $row->board ? $row->board->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'board']);

            return $table->make(true);
        }

        return view('admin.statusTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('status_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.statusTypes.create', compact('boards'));
    }

    public function store(StoreStatusTypeRequest $request)
    {
        $statusType = StatusType::create($request->all());

        return redirect()->route('admin.status-types.index');
    }

    public function edit(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boards = Board::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statusType->load('board');

        return view('admin.statusTypes.edit', compact('boards', 'statusType'));
    }

    public function update(UpdateStatusTypeRequest $request, StatusType $statusType)
    {
        $statusType->update($request->all());

        return redirect()->route('admin.status-types.index');
    }

    public function show(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusType->load('board');

        return view('admin.statusTypes.show', compact('statusType'));
    }

    public function destroy(StatusType $statusType)
    {
        abort_if(Gate::denies('status_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusType->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatusTypeRequest $request)
    {
        $statusTypes = StatusType::find(request('ids'));

        foreach ($statusTypes as $statusType) {
            $statusType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
