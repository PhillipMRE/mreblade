<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Http\Resources\Admin\AgentResource;
use App\Models\Agent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentResource(Agent::with(['user'])->get());
    }

    public function store(StoreAgentRequest $request)
    {
        $agent = Agent::create($request->all());

        return (new AgentResource($agent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agent $agent)
    {
        abort_if(Gate::denies('agent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentResource($agent->load(['user']));
    }

    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        $agent->update($request->all());

        return (new AgentResource($agent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agent $agent)
    {
        abort_if(Gate::denies('agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
