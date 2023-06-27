<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChartRequest;
use App\Http\Requests\StoreChartRequest;
use App\Http\Requests\UpdateChartRequest;
use App\Models\Chart;
use App\Models\Client;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('chart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Chart::with(['client'])->select(sprintf('%s.*', (new Chart)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'chart_show';
                $editGate = 'chart_edit';
                $deleteGate = 'chart_delete';
                $crudRoutePart = 'charts';

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
            $table->editColumn('tag', function ($row) {
                return $row->tag ? $row->tag : '';
            });
            $table->editColumn('label', function ($row) {
                return $row->label ? $row->label : '';
            });
            $table->editColumn('chart_model', function ($row) {
                return $row->chart_model ? $row->chart_model : '';
            });
            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->editColumn('client.name', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'client']);

            return $table->make(true);
        }

        return view('admin.charts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('chart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.charts.create', compact('clients'));
    }

    public function store(StoreChartRequest $request)
    {
        $chart = Chart::create($request->all());

        return redirect()->route('admin.charts.index');
    }

    public function edit(Chart $chart)
    {
        abort_if(Gate::denies('chart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chart->load('client');

        return view('admin.charts.edit', compact('chart', 'clients'));
    }

    public function update(UpdateChartRequest $request, Chart $chart)
    {
        $chart->update($request->all());

        return redirect()->route('admin.charts.index');
    }

    public function show(Chart $chart)
    {
        abort_if(Gate::denies('chart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chart->load('client');

        return view('admin.charts.show', compact('chart'));
    }

    public function destroy(Chart $chart)
    {
        abort_if(Gate::denies('chart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chart->delete();

        return back();
    }

    public function massDestroy(MassDestroyChartRequest $request)
    {
        $charts = Chart::find(request('ids'));

        foreach ($charts as $chart) {
            $chart->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
