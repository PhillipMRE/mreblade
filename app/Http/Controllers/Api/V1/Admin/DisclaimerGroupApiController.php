<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisclaimerGroupRequest;
use App\Http\Requests\UpdateDisclaimerGroupRequest;
use App\Http\Resources\Admin\DisclaimerGroupResource;
use App\Models\DisclaimerGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisclaimerGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('disclaimer_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisclaimerGroupResource(DisclaimerGroup::all());
    }

    public function store(StoreDisclaimerGroupRequest $request)
    {
        $disclaimerGroup = DisclaimerGroup::create($request->all());

        return (new DisclaimerGroupResource($disclaimerGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DisclaimerGroup $disclaimerGroup)
    {
        abort_if(Gate::denies('disclaimer_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisclaimerGroupResource($disclaimerGroup);
    }

    public function update(UpdateDisclaimerGroupRequest $request, DisclaimerGroup $disclaimerGroup)
    {
        $disclaimerGroup->update($request->all());

        return (new DisclaimerGroupResource($disclaimerGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DisclaimerGroup $disclaimerGroup)
    {
        abort_if(Gate::denies('disclaimer_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disclaimerGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
