<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListingPocketRequest;
use App\Http\Requests\StoreListingPocketRequest;
use App\Http\Requests\UpdateListingPocketRequest;
use App\Models\ListingPocket;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ListingPocketController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('listing_pocket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ListingPocket::query()->select(sprintf('%s.*', (new ListingPocket)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'listing_pocket_show';
                $editGate = 'listing_pocket_edit';
                $deleteGate = 'listing_pocket_delete';
                $crudRoutePart = 'listing-pockets';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.listingPockets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('listing_pocket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listingPockets.create');
    }

    public function store(StoreListingPocketRequest $request)
    {
        $listingPocket = ListingPocket::create($request->all());

        return redirect()->route('admin.listing-pockets.index');
    }

    public function edit(ListingPocket $listingPocket)
    {
        abort_if(Gate::denies('listing_pocket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listingPockets.edit', compact('listingPocket'));
    }

    public function update(UpdateListingPocketRequest $request, ListingPocket $listingPocket)
    {
        $listingPocket->update($request->all());

        return redirect()->route('admin.listing-pockets.index');
    }

    public function show(ListingPocket $listingPocket)
    {
        abort_if(Gate::denies('listing_pocket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listingPockets.show', compact('listingPocket'));
    }

    public function destroy(ListingPocket $listingPocket)
    {
        abort_if(Gate::denies('listing_pocket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listingPocket->delete();

        return back();
    }

    public function massDestroy(MassDestroyListingPocketRequest $request)
    {
        $listingPockets = ListingPocket::find(request('ids'));

        foreach ($listingPockets as $listingPocket) {
            $listingPocket->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
