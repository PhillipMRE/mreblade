<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisclaimerVariableRequest;
use App\Http\Requests\UpdateDisclaimerVariableRequest;
use App\Http\Resources\Admin\DisclaimerVariableResource;
use App\Models\DisclaimerVariable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisclaimerVariableApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('disclaimer_variable_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisclaimerVariableResource(DisclaimerVariable::all());
    }

    public function store(StoreDisclaimerVariableRequest $request)
    {
        $disclaimerVariable = DisclaimerVariable::create($request->all());

        return (new DisclaimerVariableResource($disclaimerVariable))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DisclaimerVariable $disclaimerVariable)
    {
        abort_if(Gate::denies('disclaimer_variable_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisclaimerVariableResource($disclaimerVariable);
    }

    public function update(UpdateDisclaimerVariableRequest $request, DisclaimerVariable $disclaimerVariable)
    {
        $disclaimerVariable->update($request->all());

        return (new DisclaimerVariableResource($disclaimerVariable))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DisclaimerVariable $disclaimerVariable)
    {
        abort_if(Gate::denies('disclaimer_variable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disclaimerVariable->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
