<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingPocketRequest;
use App\Http\Requests\UpdateListingPocketRequest;
use App\Http\Resources\Admin\ListingPocketResource;
use App\Models\ListingPocket;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListingPocketApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('listing_pocket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListingPocketResource(ListingPocket::all());
    }

    public function store(StoreListingPocketRequest $request)
    {
        $listingPocket = ListingPocket::create($request->all());

        return (new ListingPocketResource($listingPocket))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ListingPocket $listingPocket)
    {
        abort_if(Gate::denies('listing_pocket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListingPocketResource($listingPocket);
    }

    public function update(UpdateListingPocketRequest $request, ListingPocket $listingPocket)
    {
        $listingPocket->update($request->all());

        return (new ListingPocketResource($listingPocket))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ListingPocket $listingPocket)
    {
        abort_if(Gate::denies('listing_pocket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listingPocket->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
