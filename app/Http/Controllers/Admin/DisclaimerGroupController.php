<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDisclaimerGroupRequest;
use App\Http\Requests\StoreDisclaimerGroupRequest;
use App\Http\Requests\UpdateDisclaimerGroupRequest;
use App\Models\DisclaimerGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DisclaimerGroupController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('disclaimer_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DisclaimerGroup::query()->select(sprintf('%s.*', (new DisclaimerGroup)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'disclaimer_group_show';
                $editGate      = 'disclaimer_group_edit';
                $deleteGate    = 'disclaimer_group_delete';
                $crudRoutePart = 'disclaimer-groups';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.disclaimerGroups.index');
    }

    public function create()
    {
        abort_if(Gate::denies('disclaimer_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerGroups.create');
    }

    public function store(StoreDisclaimerGroupRequest $request)
    {
        $disclaimerGroup = DisclaimerGroup::create($request->all());

        return redirect()->route('admin.disclaimer-groups.index');
    }

    public function edit(DisclaimerGroup $disclaimerGroup)
    {
        abort_if(Gate::denies('disclaimer_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerGroups.edit', compact('disclaimerGroup'));
    }

    public function update(UpdateDisclaimerGroupRequest $request, DisclaimerGroup $disclaimerGroup)
    {
        $disclaimerGroup->update($request->all());

        return redirect()->route('admin.disclaimer-groups.index');
    }

    public function show(DisclaimerGroup $disclaimerGroup)
    {
        abort_if(Gate::denies('disclaimer_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerGroups.show', compact('disclaimerGroup'));
    }

    public function destroy(DisclaimerGroup $disclaimerGroup)
    {
        abort_if(Gate::denies('disclaimer_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disclaimerGroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyDisclaimerGroupRequest $request)
    {
        $disclaimerGroups = DisclaimerGroup::find(request('ids'));

        foreach ($disclaimerGroups as $disclaimerGroup) {
            $disclaimerGroup->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
