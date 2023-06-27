<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPhoneRequest;
use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\UpdatePhoneRequest;
use App\Models\Agent;
use App\Models\Phone;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('phone_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Phone::with(['agent'])->select(sprintf('%s.*', (new Phone)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'phone_show';
                $editGate = 'phone_edit';
                $deleteGate = 'phone_delete';
                $crudRoutePart = 'phones';

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
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('phone_type', function ($row) {
                return $row->phone_type ? Phone::PHONE_TYPE_SELECT[$row->phone_type] : '';
            });
            $table->addColumn('agent_display_name', function ($row) {
                return $row->agent ? $row->agent->display_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'agent']);

            return $table->make(true);
        }

        return view('admin.phones.index');
    }

    public function create()
    {
        abort_if(Gate::denies('phone_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = Agent::pluck('display_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.phones.create', compact('agents'));
    }

    public function store(StorePhoneRequest $request)
    {
        $phone = Phone::create($request->all());

        return redirect()->route('admin.phones.index');
    }

    public function edit(Phone $phone)
    {
        abort_if(Gate::denies('phone_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = Agent::pluck('display_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phone->load('agent');

        return view('admin.phones.edit', compact('agents', 'phone'));
    }

    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
        $phone->update($request->all());

        return redirect()->route('admin.phones.index');
    }

    public function show(Phone $phone)
    {
        abort_if(Gate::denies('phone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phone->load('agent');

        return view('admin.phones.show', compact('phone'));
    }

    public function destroy(Phone $phone)
    {
        abort_if(Gate::denies('phone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phone->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhoneRequest $request)
    {
        $phones = Phone::find(request('ids'));

        foreach ($phones as $phone) {
            $phone->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
