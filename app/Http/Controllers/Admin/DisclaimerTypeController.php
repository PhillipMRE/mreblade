<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDisclaimerTypeRequest;
use App\Http\Requests\StoreDisclaimerTypeRequest;
use App\Http\Requests\UpdateDisclaimerTypeRequest;
use App\Models\DisclaimerType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DisclaimerTypeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('disclaimer_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DisclaimerType::query()->select(sprintf('%s.*', (new DisclaimerType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'disclaimer_type_show';
                $editGate      = 'disclaimer_type_edit';
                $deleteGate    = 'disclaimer_type_delete';
                $crudRoutePart = 'disclaimer-types';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.disclaimerTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('disclaimer_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerTypes.create');
    }

    public function store(StoreDisclaimerTypeRequest $request)
    {
        $disclaimerType = DisclaimerType::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $disclaimerType->id]);
        }

        return redirect()->route('admin.disclaimer-types.index');
    }

    public function edit(DisclaimerType $disclaimerType)
    {
        abort_if(Gate::denies('disclaimer_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerTypes.edit', compact('disclaimerType'));
    }

    public function update(UpdateDisclaimerTypeRequest $request, DisclaimerType $disclaimerType)
    {
        $disclaimerType->update($request->all());

        return redirect()->route('admin.disclaimer-types.index');
    }

    public function show(DisclaimerType $disclaimerType)
    {
        abort_if(Gate::denies('disclaimer_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.disclaimerTypes.show', compact('disclaimerType'));
    }

    public function destroy(DisclaimerType $disclaimerType)
    {
        abort_if(Gate::denies('disclaimer_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disclaimerType->delete();

        return back();
    }

    public function massDestroy(MassDestroyDisclaimerTypeRequest $request)
    {
        $disclaimerTypes = DisclaimerType::find(request('ids'));

        foreach ($disclaimerTypes as $disclaimerType) {
            $disclaimerType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('disclaimer_type_create') && Gate::denies('disclaimer_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DisclaimerType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
