<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySmsTemplateRequest;
use App\Http\Requests\StoreSmsTemplateRequest;
use App\Http\Requests\UpdateSmsTemplateRequest;
use App\Models\Customer;
use App\Models\Keyword;
use App\Models\SmsTemplate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SmsTemplateController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sms_template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SmsTemplate::with(['keyword', 'customer'])->select(sprintf('%s.*', (new SmsTemplate)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sms_template_show';
                $editGate = 'sms_template_edit';
                $deleteGate = 'sms_template_delete';
                $crudRoutePart = 'sms-templates';

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
            $table->editColumn('nickname', function ($row) {
                return $row->nickname ? $row->nickname : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.smsTemplates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sms_template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywords = Keyword::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.smsTemplates.create', compact('customers', 'keywords'));
    }

    public function store(StoreSmsTemplateRequest $request)
    {
        $smsTemplate = SmsTemplate::create($request->all());

        return redirect()->route('admin.sms-templates.index');
    }

    public function edit(SmsTemplate $smsTemplate)
    {
        abort_if(Gate::denies('sms_template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywords = Keyword::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $smsTemplate->load('keyword', 'customer');

        return view('admin.smsTemplates.edit', compact('customers', 'keywords', 'smsTemplate'));
    }

    public function update(UpdateSmsTemplateRequest $request, SmsTemplate $smsTemplate)
    {
        $smsTemplate->update($request->all());

        return redirect()->route('admin.sms-templates.index');
    }

    public function show(SmsTemplate $smsTemplate)
    {
        abort_if(Gate::denies('sms_template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smsTemplate->load('keyword', 'customer');

        return view('admin.smsTemplates.show', compact('smsTemplate'));
    }

    public function destroy(SmsTemplate $smsTemplate)
    {
        abort_if(Gate::denies('sms_template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smsTemplate->delete();

        return back();
    }

    public function massDestroy(MassDestroySmsTemplateRequest $request)
    {
        $smsTemplates = SmsTemplate::find(request('ids'));

        foreach ($smsTemplates as $smsTemplate) {
            $smsTemplate->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
