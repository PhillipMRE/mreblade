<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgentRequest;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Agent;
use App\Models\Phone;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AgentsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('agent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Agent::with(['user', 'phones'])->select(sprintf('%s.*', (new Agent)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'agent_show';
                $editGate      = 'agent_edit';
                $deleteGate    = 'agent_delete';
                $crudRoutePart = 'agents';

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
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('is_vetted', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_vetted ? 'checked' : null) . '>';
            });
            $table->editColumn('template', function ($row) {
                return $row->template ? $row->template : '';
            });
            $table->editColumn('phone', function ($row) {
                $labels = [];
                foreach ($row->phones as $phone) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $phone->number);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'published', 'is_vetted', 'phone']);

            return $table->make(true);
        }

        return view('admin.agents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('agent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phones = Phone::pluck('number', 'id');

        return view('admin.agents.create', compact('phones', 'users'));
    }

    public function store(StoreAgentRequest $request)
    {
        $agent = Agent::create($request->all());
        $agent->phones()->sync($request->input('phones', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $agent->id]);
        }

        return redirect()->route('admin.agents.index');
    }

    public function edit(Agent $agent)
    {
        abort_if(Gate::denies('agent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phones = Phone::pluck('number', 'id');

        $agent->load('user', 'phones');

        return view('admin.agents.edit', compact('agent', 'phones', 'users'));
    }

    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        $agent->update($request->all());
        $agent->phones()->sync($request->input('phones', []));

        return redirect()->route('admin.agents.index');
    }

    public function show(Agent $agent)
    {
        abort_if(Gate::denies('agent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent->load('user', 'phones', 'agentClients');

        return view('admin.agents.show', compact('agent'));
    }

    public function destroy(Agent $agent)
    {
        abort_if(Gate::denies('agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgentRequest $request)
    {
        $agents = Agent::find(request('ids'));

        foreach ($agents as $agent) {
            $agent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('agent_create') && Gate::denies('agent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Agent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
