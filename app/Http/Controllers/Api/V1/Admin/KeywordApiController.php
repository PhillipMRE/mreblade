<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKeywordRequest;
use App\Http\Requests\UpdateKeywordRequest;
use App\Http\Resources\Admin\KeywordResource;
use App\Models\Keyword;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class KeywordApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('keyword_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeywordResource(Keyword::with(['agents', 'customer'])->get());
    }

    public function store(StoreKeywordRequest $request)
    {
        $keyword = Keyword::create($request->all());
        $keyword->agents()->sync($request->input('agents', []));

        return (new KeywordResource($keyword))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Keyword $keyword)
    {
        abort_if(Gate::denies('keyword_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KeywordResource($keyword->load(['agents', 'customer']));
    }

    public function update(UpdateKeywordRequest $request, Keyword $keyword)
    {
        $keyword->update($request->all());
        $keyword->agents()->sync($request->input('agents', []));

        return (new KeywordResource($keyword))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Keyword $keyword)
    {
        abort_if(Gate::denies('keyword_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
