<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccessTokenRequest;
use App\Http\Requests\UpdateAccessTokenRequest;
use App\Http\Resources\Admin\AccessTokenResource;
use App\Models\AccessToken;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AccessTokenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('access_token_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccessTokenResource(AccessToken::with(['user'])->get());
    }

    public function store(StoreAccessTokenRequest $request)
    {
        $accessToken = AccessToken::create($request->all());

        return (new AccessTokenResource($accessToken))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AccessToken $accessToken)
    {
        abort_if(Gate::denies('access_token_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccessTokenResource($accessToken->load(['user']));
    }

    public function update(UpdateAccessTokenRequest $request, AccessToken $accessToken)
    {
        $accessToken->update($request->all());

        return (new AccessTokenResource($accessToken))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AccessToken $accessToken)
    {
        abort_if(Gate::denies('access_token_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accessToken->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
