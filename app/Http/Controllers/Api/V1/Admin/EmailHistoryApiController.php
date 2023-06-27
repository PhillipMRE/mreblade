<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailHistoryRequest;
use App\Http\Requests\UpdateEmailHistoryRequest;
use App\Http\Resources\Admin\EmailHistoryResource;
use App\Models\EmailHistory;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class EmailHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('email_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmailHistoryResource(EmailHistory::with(['customer'])->get());
    }

    public function store(StoreEmailHistoryRequest $request)
    {
        $emailHistory = EmailHistory::create($request->all());

        return (new EmailHistoryResource($emailHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EmailHistory $emailHistory)
    {
        abort_if(Gate::denies('email_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmailHistoryResource($emailHistory->load(['customer']));
    }

    public function update(UpdateEmailHistoryRequest $request, EmailHistory $emailHistory)
    {
        $emailHistory->update($request->all());

        return (new EmailHistoryResource($emailHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EmailHistory $emailHistory)
    {
        abort_if(Gate::denies('email_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
