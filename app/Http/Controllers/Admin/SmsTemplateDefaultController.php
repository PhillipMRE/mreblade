<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySmsTemplateDefaultRequest;
use App\Http\Requests\StoreSmsTemplateDefaultRequest;
use App\Http\Requests\UpdateSmsTemplateDefaultRequest;
use App\Models\Customer;
use App\Models\Keyword;
use App\Models\SmsTemplateDefault;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SmsTemplateDefaultController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sms_template_default_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SmsTemplateDefault::with(['keyword', 'customer'])->select(sprintf('%s.*', (new SmsTemplateDefault)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sms_template_default_show';
                $editGate      = 'sms_template_default_edit';
                $deleteGate    = 'sms_template_default_delete';
                $crudRoutePart = 'sms-template-defaults';

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

        return view('admin.smsTemplateDefaults.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sms_template_default_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywords = Keyword::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.smsTemplateDefaults.create', compact('customers', 'keywords'));
    }

    public function store(StoreSmsTemplateDefaultRequest $request)
    {
        $smsTemplateDefault = SmsTemplateDefault::create($request->all());

        return redirect()->route('admin.sms-template-defaults.index');
    }

    public function edit(SmsTemplateDefault $smsTemplateDefault)
    {
        abort_if(Gate::denies('sms_template_default_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywords = Keyword::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $smsTemplateDefault->load('keyword', 'customer');

        return view('admin.smsTemplateDefaults.edit', compact('customers', 'keywords', 'smsTemplateDefault'));
    }

    public function update(UpdateSmsTemplateDefaultRequest $request, SmsTemplateDefault $smsTemplateDefault)
    {
        $smsTemplateDefault->update($request->all());

        return redirect()->route('admin.sms-template-defaults.index');
    }

    public function show(SmsTemplateDefault $smsTemplateDefault)
    {
        abort_if(Gate::denies('sms_template_default_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smsTemplateDefault->load('keyword', 'customer');

        return view('admin.smsTemplateDefaults.show', compact('smsTemplateDefault'));
    }

    public function destroy(SmsTemplateDefault $smsTemplateDefault)
    {
        abort_if(Gate::denies('sms_template_default_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $smsTemplateDefault->delete();

        return back();
    }

    public function massDestroy(MassDestroySmsTemplateDefaultRequest $request)
    {
        $smsTemplateDefaults = SmsTemplateDefault::find(request('ids'));

        foreach ($smsTemplateDefaults as $smsTemplateDefault) {
            $smsTemplateDefault->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
