<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeywordAppRequest;
use App\Http\Requests\UpdateKeywordAppRequest;
use App\Http\Resources\Admin\KeywordAppResource;
use App\Models\KeywordApp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KeywordAppApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('keyword_app_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeywordAppResource(KeywordApp::all());
    }

    public function store(StoreKeywordAppRequest $request)
    {
        $keywordApp = KeywordApp::create($request->all());

        return (new KeywordAppResource($keywordApp))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(KeywordApp $keywordApp)
    {
        abort_if(Gate::denies('keyword_app_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeywordAppResource($keywordApp);
    }

    public function update(UpdateKeywordAppRequest $request, KeywordApp $keywordApp)
    {
        $keywordApp->update($request->all());

        return (new KeywordAppResource($keywordApp))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(KeywordApp $keywordApp)
    {
        abort_if(Gate::denies('keyword_app_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywordApp->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
