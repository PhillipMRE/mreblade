<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeywordRequest;
use App\Http\Requests\StoreKeywordRequest;
use App\Http\Requests\UpdateKeywordRequest;
use App\Models\Agent;
use App\Models\Keyword;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KeywordController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('keyword_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Keyword::with(['agents'])->select(sprintf('%s.*', (new Keyword)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'keyword_show';
                $editGate      = 'keyword_edit';
                $deleteGate    = 'keyword_delete';
                $crudRoutePart = 'keywords';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('agents', function ($row) {
                $labels = [];
                foreach ($row->agents as $agent) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $agent->display_name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'agents']);

            return $table->make(true);
        }

        return view('admin.keywords.index');
    }

    public function create()
    {
        abort_if(Gate::denies('keyword_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = Agent::pluck('display_name', 'id');

        return view('admin.keywords.create', compact('agents'));
    }

    public function store(StoreKeywordRequest $request)
    {
        $keyword = Keyword::create($request->all());
        $keyword->agents()->sync($request->input('agents', []));

        return redirect()->route('admin.keywords.index');
    }

    public function edit(Keyword $keyword)
    {
        abort_if(Gate::denies('keyword_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = Agent::pluck('display_name', 'id');

        $keyword->load('agents');

        return view('admin.keywords.edit', compact('agents', 'keyword'));
    }

    public function update(UpdateKeywordRequest $request, Keyword $keyword)
    {
        $keyword->update($request->all());
        $keyword->agents()->sync($request->input('agents', []));

        return redirect()->route('admin.keywords.index');
    }

    public function show(Keyword $keyword)
    {
        abort_if(Gate::denies('keyword_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword->load('agents');

        return view('admin.keywords.show', compact('keyword'));
    }

    public function destroy(Keyword $keyword)
    {
        abort_if(Gate::denies('keyword_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword->delete();

        return back();
    }

    public function massDestroy(MassDestroyKeywordRequest $request)
    {
        $keywords = Keyword::find(request('ids'));

        foreach ($keywords as $keyword) {
            $keyword->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
