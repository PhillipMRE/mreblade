<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChartRequest;
use App\Http\Requests\UpdateChartRequest;
use App\Http\Resources\Admin\ChartResource;
use App\Models\Chart;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ChartApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('chart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChartResource(Chart::with(['client'])->get());
    }

    public function store(StoreChartRequest $request)
    {
        $chart = Chart::create($request->all());

        return (new ChartResource($chart))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Chart $chart)
    {
        abort_if(Gate::denies('chart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChartResource($chart->load(['client']));
    }

    public function update(UpdateChartRequest $request, Chart $chart)
    {
        $chart->update($request->all());

        return (new ChartResource($chart))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Chart $chart)
    {
        abort_if(Gate::denies('chart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chart->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
