<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLendingOfficerRequest;
use App\Http\Requests\StoreLendingOfficerRequest;
use App\Http\Requests\UpdateLendingOfficerRequest;
use App\Models\LendingOfficer;
use App\Models\Phone;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LendingOfficerController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('lending_officer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LendingOfficer::with(['user', 'phone_numbers', 'phone'])->select(sprintf('%s.*', (new LendingOfficer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'lending_officer_show';
                $editGate = 'lending_officer_edit';
                $deleteGate = 'lending_officer_delete';
                $crudRoutePart = 'lending-officers';

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
            $table->editColumn('contact_phone', function ($row) {
                return $row->contact_phone ? $row->contact_phone : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('admin.lendingOfficers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lending_officer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phone_numbers = Phone::pluck('number', 'id');

        $phones = Phone::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lendingOfficers.create', compact('phone_numbers', 'phones', 'users'));
    }

    public function store(StoreLendingOfficerRequest $request)
    {
        $lendingOfficer = LendingOfficer::create($request->all());
        $lendingOfficer->phone_numbers()->sync($request->input('phone_numbers', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $lendingOfficer->id]);
        }

        return redirect()->route('admin.lending-officers.index');
    }

    public function edit(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phone_numbers = Phone::pluck('number', 'id');

        $phones = Phone::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lendingOfficer->load('user', 'phone_numbers', 'phone');

        return view('admin.lendingOfficers.edit', compact('lendingOfficer', 'phone_numbers', 'phones', 'users'));
    }

    public function update(UpdateLendingOfficerRequest $request, LendingOfficer $lendingOfficer)
    {
        $lendingOfficer->update($request->all());
        $lendingOfficer->phone_numbers()->sync($request->input('phone_numbers', []));

        return redirect()->route('admin.lending-officers.index');
    }

    public function show(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lendingOfficer->load('user', 'phone_numbers', 'phone', 'lendingOfficerCustomers');

        return view('admin.lendingOfficers.show', compact('lendingOfficer'));
    }

    public function destroy(LendingOfficer $lendingOfficer)
    {
        abort_if(Gate::denies('lending_officer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lendingOfficer->delete();

        return back();
    }

    public function massDestroy(MassDestroyLendingOfficerRequest $request)
    {
        $lendingOfficers = LendingOfficer::find(request('ids'));

        foreach ($lendingOfficers as $lendingOfficer) {
            $lendingOfficer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('lending_officer_create') && Gate::denies('lending_officer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new LendingOfficer();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
