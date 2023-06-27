<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeywordPrerenderRequest;
use App\Http\Requests\StoreKeywordPrerenderRequest;
use App\Http\Requests\UpdateKeywordPrerenderRequest;
use App\Models\Keyword;
use App\Models\KeywordPrerender;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KeywordPrerenderController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('keyword_prerender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KeywordPrerender::with(['keyword'])->select(sprintf('%s.*', (new KeywordPrerender)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'keyword_prerender_show';
                $editGate = 'keyword_prerender_edit';
                $deleteGate = 'keyword_prerender_delete';
                $crudRoutePart = 'keyword-prerenders';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('url', function ($row) {
                return $row->url ? $row->url : '';
            });
            $table->editColumn('memento', function ($row) {
                return $row->memento ? $row->memento : '';
            });
            $table->addColumn('keyword_name', function ($row) {
                return $row->keyword ? $row->keyword->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'keyword']);

            return $table->make(true);
        }

        return view('admin.keywordPrerenders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('keyword_prerender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywords = Keyword::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.keywordPrerenders.create', compact('keywords'));
    }

    public function store(StoreKeywordPrerenderRequest $request)
    {
        $keywordPrerender = KeywordPrerender::create($request->all());

        return redirect()->route('admin.keyword-prerenders.index');
    }

    public function edit(KeywordPrerender $keywordPrerender)
    {
        abort_if(Gate::denies('keyword_prerender_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywords = Keyword::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $keywordPrerender->load('keyword');

        return view('admin.keywordPrerenders.edit', compact('keywordPrerender', 'keywords'));
    }

    public function update(UpdateKeywordPrerenderRequest $request, KeywordPrerender $keywordPrerender)
    {
        $keywordPrerender->update($request->all());

        return redirect()->route('admin.keyword-prerenders.index');
    }

    public function show(KeywordPrerender $keywordPrerender)
    {
        abort_if(Gate::denies('keyword_prerender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywordPrerender->load('keyword');

        return view('admin.keywordPrerenders.show', compact('keywordPrerender'));
    }

    public function destroy(KeywordPrerender $keywordPrerender)
    {
        abort_if(Gate::denies('keyword_prerender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywordPrerender->delete();

        return back();
    }

    public function massDestroy(MassDestroyKeywordPrerenderRequest $request)
    {
        $keywordPrerenders = KeywordPrerender::find(request('ids'));

        foreach ($keywordPrerenders as $keywordPrerender) {
            $keywordPrerender->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
