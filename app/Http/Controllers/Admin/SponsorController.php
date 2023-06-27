<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySponsorRequest;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Models\Carrier;
use App\Models\Client;
use App\Models\Customer;
use App\Models\Phone;
use App\Models\Sponsor;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SponsorController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sponsor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sponsor::with(['client', 'user', 'customers', 'carriers', 'phone_numbers'])->select(sprintf('%s.*', (new Sponsor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sponsor_show';
                $editGate = 'sponsor_edit';
                $deleteGate = 'sponsor_delete';
                $crudRoutePart = 'sponsors';

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
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled '.($row->published ? 'checked' : null).'>';
            });
            $table->editColumn('display_name', function ($row) {
                return $row->display_name ? $row->display_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('admin.sponsors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sponsor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('suspended', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id');

        $carriers = Carrier::pluck('name', 'id');

        $phone_numbers = Phone::pluck('number', 'id');

        return view('admin.sponsors.create', compact('carriers', 'clients', 'customers', 'phone_numbers', 'users'));
    }

    public function store(StoreSponsorRequest $request)
    {
        $sponsor = Sponsor::create($request->all());
        $sponsor->customers()->sync($request->input('customers', []));
        $sponsor->carriers()->sync($request->input('carriers', []));
        $sponsor->phone_numbers()->sync($request->input('phone_numbers', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sponsor->id]);
        }

        return redirect()->route('admin.sponsors.index');
    }

    public function edit(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('suspended', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('name', 'id');

        $carriers = Carrier::pluck('name', 'id');

        $phone_numbers = Phone::pluck('number', 'id');

        $sponsor->load('client', 'user', 'customers', 'carriers', 'phone_numbers');

        return view('admin.sponsors.edit', compact('carriers', 'clients', 'customers', 'phone_numbers', 'sponsor', 'users'));
    }

    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $sponsor->update($request->all());
        $sponsor->customers()->sync($request->input('customers', []));
        $sponsor->carriers()->sync($request->input('carriers', []));
        $sponsor->phone_numbers()->sync($request->input('phone_numbers', []));

        return redirect()->route('admin.sponsors.index');
    }

    public function show(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sponsor->load('client', 'user', 'customers', 'carriers', 'phone_numbers');

        return view('admin.sponsors.show', compact('sponsor'));
    }

    public function destroy(Sponsor $sponsor)
    {
        abort_if(Gate::denies('sponsor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sponsor->delete();

        return back();
    }

    public function massDestroy(MassDestroySponsorRequest $request)
    {
        $sponsors = Sponsor::find(request('ids'));

        foreach ($sponsors as $sponsor) {
            $sponsor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sponsor_create') && Gate::denies('sponsor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Sponsor();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
