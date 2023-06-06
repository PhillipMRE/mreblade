<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStateResidentRequest;
use App\Http\Requests\UpdateStateResidentRequest;
use App\Http\Resources\Admin\StateResidentResource;
use App\Models\StateResident;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StateResidentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('state_resident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StateResidentResource(StateResident::with(['board'])->get());
    }

    public function store(StoreStateResidentRequest $request)
    {
        $stateResident = StateResident::create($request->all());

        return (new StateResidentResource($stateResident))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StateResident $stateResident)
    {
        abort_if(Gate::denies('state_resident_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StateResidentResource($stateResident->load(['board']));
    }

    public function update(UpdateStateResidentRequest $request, StateResident $stateResident)
    {
        $stateResident->update($request->all());

        return (new StateResidentResource($stateResident))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StateResident $stateResident)
    {
        abort_if(Gate::denies('state_resident_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stateResident->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
