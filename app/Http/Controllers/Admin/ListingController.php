<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListingRequest;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('listing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Listing::query()->select(sprintf('%s.*', (new Listing)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'listing_show';
                $editGate      = 'listing_edit';
                $deleteGate    = 'listing_delete';
                $crudRoutePart = 'listings';

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
            $table->editColumn('full_address', function ($row) {
                return $row->full_address ? $row->full_address : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.listings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('listing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listings.create');
    }

    public function store(StoreListingRequest $request)
    {
        $listing = Listing::create($request->all());

        return redirect()->route('admin.listings.index');
    }

    public function edit(Listing $listing)
    {
        abort_if(Gate::denies('listing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listings.edit', compact('listing'));
    }

    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $listing->update($request->all());

        return redirect()->route('admin.listings.index');
    }

    public function show(Listing $listing)
    {
        abort_if(Gate::denies('listing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listings.show', compact('listing'));
    }

    public function destroy(Listing $listing)
    {
        abort_if(Gate::denies('listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listing->delete();

        return back();
    }

    public function massDestroy(MassDestroyListingRequest $request)
    {
        $listings = Listing::find(request('ids'));

        foreach ($listings as $listing) {
            $listing->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
