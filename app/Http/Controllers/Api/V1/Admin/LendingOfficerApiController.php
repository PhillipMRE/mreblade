<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLendingOfficerRequest;
use App\Http\Requests\UpdateLendingOfficerRequest;
use App\Http\Resources\Admin\LendingOfficerResource;
use App\Models\LendingOfficer;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class LendingOfficerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('lending_officer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LendingOfficerResource(LendingOfficer::with(['user', 'phone_numbers', 'phone'])->get());
    }

    public function store(StoreLendingOfficerRequest $request)
    {
        $lendingOfficer = LendingOfficer::create($request->all());
        $lendingOfficer->phone_numbers()->sync($request->input('phone_numbers', []));

        return (new LendingOfficerResource($lendingOfficer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LendingOfficerResource($lendingOfficer->load(['user', 'phone_numbers', 'phone']));
    }

    public function update(UpdateLendingOfficerRequest $request, LendingOfficer $lendingOfficer)
    {
        $lendingOfficer->update($request->all());
        $lendingOfficer->phone_numbers()->sync($request->input('phone_numbers', []));

        return (new LendingOfficerResource($lendingOfficer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lendingOfficer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
