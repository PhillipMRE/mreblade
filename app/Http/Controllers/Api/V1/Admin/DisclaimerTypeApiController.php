<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDisclaimerTypeRequest;
use App\Http\Requests\UpdateDisclaimerTypeRequest;
use App\Http\Resources\Admin\DisclaimerTypeResource;
use App\Models\DisclaimerType;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DisclaimerTypeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('disclaimer_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisclaimerTypeResource(DisclaimerType::all());
    }

    public function store(StoreDisclaimerTypeRequest $request)
    {
        $disclaimerType = DisclaimerType::create($request->all());

        return (new DisclaimerTypeResource($disclaimerType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DisclaimerType $disclaimerType)
    {
        abort_if(Gate::denies('disclaimer_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisclaimerTypeResource($disclaimerType);
    }

    public function update(UpdateDisclaimerTypeRequest $request, DisclaimerType $disclaimerType)
    {
        $disclaimerType->update($request->all());

        return (new DisclaimerTypeResource($disclaimerType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DisclaimerType $disclaimerType)
    {
        abort_if(Gate::denies('disclaimer_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disclaimerType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
