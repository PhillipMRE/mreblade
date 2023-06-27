<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDisclaimerVariableRequest;
use App\Http\Requests\StoreDisclaimerVariableRequest;
use App\Http\Requests\UpdateDisclaimerVariableRequest;
use App\Models\DisclaimerVariable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DisclaimerVariableController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('disclaimer_variable_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DisclaimerVariable::query()->select(sprintf('%s.*', (new DisclaimerVariable)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'disclaimer_variable_show';
                $editGate = 'disclaimer_variable_edit';
                $deleteGate = 'disclaimer_variable_delete';
                $crudRoutePart = 'disclaimer-variables';

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

        return view('admin.disclaimerVariables.index');
    }

    public function create()
    {
        abort_if(Gate::denies('disclaimer_variable_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerVariables.create');
    }

    public function store(StoreDisclaimerVariableRequest $request)
    {
        $disclaimerVariable = DisclaimerVariable::create($request->all());

        return redirect()->route('admin.disclaimer-variables.index');
    }

    public function edit(DisclaimerVariable $disclaimerVariable)
    {
        abort_if(Gate::denies('disclaimer_variable_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerVariables.edit', compact('disclaimerVariable'));
    }

    public function update(UpdateDisclaimerVariableRequest $request, DisclaimerVariable $disclaimerVariable)
    {
        $disclaimerVariable->update($request->all());

        return redirect()->route('admin.disclaimer-variables.index');
    }

    public function show(DisclaimerVariable $disclaimerVariable)
    {
        abort_if(Gate::denies('disclaimer_variable_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerVariables.show', compact('disclaimerVariable'));
    }

    public function destroy(DisclaimerVariable $disclaimerVariable)
    {
        abort_if(Gate::denies('disclaimer_variable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disclaimerVariable->delete();

        return back();
    }

    public function massDestroy(MassDestroyDisclaimerVariableRequest $request)
    {
        $disclaimerVariables = DisclaimerVariable::find(request('ids'));

        foreach ($disclaimerVariables as $disclaimerVariable) {
            $disclaimerVariable->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
