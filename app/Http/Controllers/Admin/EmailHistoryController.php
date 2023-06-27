<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmailHistoryRequest;
use App\Http\Requests\StoreEmailHistoryRequest;
use App\Http\Requests\UpdateEmailHistoryRequest;
use App\Models\Customer;
use App\Models\EmailHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmailHistoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('email_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EmailHistory::with(['customer'])->select(sprintf('%s.*', (new EmailHistory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'email_history_show';
                $editGate = 'email_history_edit';
                $deleteGate = 'email_history_delete';
                $crudRoutePart = 'email-histories';

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
            $table->editColumn('recipient_email', function ($row) {
                return $row->recipient_email ? $row->recipient_email : '';
            });
            $table->editColumn('sender_email', function ($row) {
                return $row->sender_email ? $row->sender_email : '';
            });
            $table->editColumn('subject', function ($row) {
                return $row->subject ? $row->subject : '';
            });
            $table->editColumn('state', function ($row) {
                return $row->state ? $row->state : '';
            });
            $table->editColumn('opens', function ($row) {
                return $row->opens ? $row->opens : '';
            });
            $table->editColumn('clicks', function ($row) {
                return $row->clicks ? $row->clicks : '';
            });
            $table->addColumn('customer_active', function ($row) {
                return $row->customer ? $row->customer->active : '';
            });

            $table->editColumn('customer.name', function ($row) {
                return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'customer']);

            return $table->make(true);
        }

        return view('admin.emailHistories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('email_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('active', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.emailHistories.create', compact('customers'));
    }

    public function store(StoreEmailHistoryRequest $request)
    {
        $emailHistory = EmailHistory::create($request->all());

        return redirect()->route('admin.email-histories.index');
    }

    public function edit(EmailHistory $emailHistory)
    {
        abort_if(Gate::denies('email_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('active', 'id')->prepend(trans('global.pleaseSelect'), '');

        $emailHistory->load('customer');

        return view('admin.emailHistories.edit', compact('customers', 'emailHistory'));
    }

    public function update(UpdateEmailHistoryRequest $request, EmailHistory $emailHistory)
    {
        $emailHistory->update($request->all());

        return redirect()->route('admin.email-histories.index');
    }

    public function show(EmailHistory $emailHistory)
    {
        abort_if(Gate::denies('email_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailHistory->load('customer');

        return view('admin.emailHistories.show', compact('emailHistory'));
    }

    public function destroy(EmailHistory $emailHistory)
    {
        abort_if(Gate::denies('email_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emailHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmailHistoryRequest $request)
    {
        $emailHistories = EmailHistory::find(request('ids'));

        foreach ($emailHistories as $emailHistory) {
            $emailHistory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
