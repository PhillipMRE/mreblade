<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Http\Resources\Admin\SponsorResource;
use App\Models\Sponsor;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SponsorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sponsor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SponsorResource(Sponsor::with(['client', 'user', 'customers', 'carriers', 'phone_numbers'])->get());
    }

    public function store(StoreSponsorRequest $request)
    {
        $sponsor = Sponsor::create($request->all());
        $sponsor->customers()->sync($request->input('customers', []));
        $sponsor->carriers()->sync($request->input('carriers', []));
        $sponsor->phone_numbers()->sync($request->input('phone_numbers', []));

        return (new SponsorResource($sponsor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SponsorResource($sponsor->load(['client', 'user', 'customers', 'carriers', 'phone_numbers']));
    }

    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $sponsor->update($request->all());
        $sponsor->customers()->sync($request->input('customers', []));
        $sponsor->carriers()->sync($request->input('carriers', []));
        $sponsor->phone_numbers()->sync($request->input('phone_numbers', []));

        return (new SponsorResource($sponsor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sponsor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
