<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSmsTemplateDefaultRequest;
use App\Http\Requests\UpdateSmsTemplateDefaultRequest;
use App\Http\Resources\Admin\SmsTemplateDefaultResource;
use App\Models\SmsTemplateDefault;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SmsTemplateDefaultApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sms_template_default_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SmsTemplateDefaultResource(SmsTemplateDefault::with(['keyword', 'customer'])->get());
    }

    public function store(StoreSmsTemplateDefaultRequest $request)
    {
        $smsTemplateDefault = SmsTemplateDefault::create($request->all());

        return (new SmsTemplateDefaultResource($smsTemplateDefault))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SmsTemplateDefault $smsTemplateDefault)
    {
        abort_if(Gate::denies('sms_template_default_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SmsTemplateDefaultResource($smsTemplateDefault->load(['keyword', 'customer']));
    }

    public function update(UpdateSmsTemplateDefaultRequest $request, SmsTemplateDefault $smsTemplateDefault)
    {
        $smsTemplateDefault->update($request->all());

        return (new SmsTemplateDefaultResource($smsTemplateDefault))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SmsTemplateDefault $smsTemplateDefault)
    {
        abort_if(Gate::denies('sms_template_default_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smsTemplateDefault->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
