<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\Admin\ListingResource;
use App\Models\Listing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('listing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListingResource(Listing::all());
    }

    public function store(StoreListingRequest $request)
    {
        $listing = Listing::create($request->all());

        return (new ListingResource($listing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Listing $listing)
    {
        abort_if(Gate::denies('listing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListingResource($listing);
    }

    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $listing->update($request->all());

        return (new ListingResource($listing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Listing $listing)
    {
        abort_if(Gate::denies('listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
