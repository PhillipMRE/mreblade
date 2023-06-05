<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeywordPrerenderRequest;
use App\Http\Requests\UpdateKeywordPrerenderRequest;
use App\Http\Resources\Admin\KeywordPrerenderResource;
use App\Models\KeywordPrerender;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KeywordPrerenderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('keyword_prerender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeywordPrerenderResource(KeywordPrerender::with(['keyword'])->get());
    }

    public function store(StoreKeywordPrerenderRequest $request)
    {
        $keywordPrerender = KeywordPrerender::create($request->all());

        return (new KeywordPrerenderResource($keywordPrerender))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(KeywordPrerender $keywordPrerender)
    {
        abort_if(Gate::denies('keyword_prerender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeywordPrerenderResource($keywordPrerender->load(['keyword']));
    }

    public function update(UpdateKeywordPrerenderRequest $request, KeywordPrerender $keywordPrerender)
    {
        $keywordPrerender->update($request->all());

        return (new KeywordPrerenderResource($keywordPrerender))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(KeywordPrerender $keywordPrerender)
    {
        abort_if(Gate::denies('keyword_prerender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywordPrerender->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
