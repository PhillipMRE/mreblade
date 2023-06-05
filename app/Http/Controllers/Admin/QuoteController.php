<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuoteRequest;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Client;
use App\Models\Quote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('quote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Quote::with(['client'])->select(sprintf('%s.*', (new Quote)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'quote_show';
                $editGate      = 'quote_edit';
                $deleteGate    = 'quote_delete';
                $crudRoutePart = 'quotes';

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
            $table->editColumn('purchase_price', function ($row) {
                return $row->purchase_price ? $row->purchase_price : '';
            });
            $table->editColumn('down_payment', function ($row) {
                return $row->down_payment ? $row->down_payment : '';
            });
            $table->editColumn('credit_score', function ($row) {
                return $row->credit_score ? $row->credit_score : '';
            });
            $table->addColumn('client_published', function ($row) {
                return $row->client ? $row->client->published : '';
            });

            $table->editColumn('client.name', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'client']);

            return $table->make(true);
        }

        return view('admin.quotes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('quote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('published', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.quotes.create', compact('clients'));
    }

    public function store(StoreQuoteRequest $request)
    {
        $quote = Quote::create($request->all());

        return redirect()->route('admin.quotes.index');
    }

    public function edit(Quote $quote)
    {
        abort_if(Gate::denies('quote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('published', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quote->load('client');

        return view('admin.quotes.edit', compact('clients', 'quote'));
    }

    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $quote->update($request->all());

        return redirect()->route('admin.quotes.index');
    }

    public function show(Quote $quote)
    {
        abort_if(Gate::denies('quote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quote->load('client');

        return view('admin.quotes.show', compact('quote'));
    }

    public function destroy(Quote $quote)
    {
        abort_if(Gate::denies('quote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quote->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuoteRequest $request)
    {
        $quotes = Quote::find(request('ids'));

        foreach ($quotes as $quote) {
            $quote->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
