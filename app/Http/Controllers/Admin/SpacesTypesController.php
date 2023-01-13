<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpacesType\BulkDestroySpacesType;
use App\Http\Requests\Admin\SpacesType\DestroySpacesType;
use App\Http\Requests\Admin\SpacesType\IndexSpacesType;
use App\Http\Requests\Admin\SpacesType\StoreSpacesType;
use App\Http\Requests\Admin\SpacesType\UpdateSpacesType;
use App\Models\SpacesType;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SpacesTypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSpacesType $request
     * @return array|Factory|View
     */
    public function index(IndexSpacesType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SpacesType::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['enabled', 'id', 'name'],

            // set columns to searchIn
            ['description', 'id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.spaces-type.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.spaces-type.create');

        return view('admin.spaces-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSpacesType $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSpacesType $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SpacesType
        $spacesType = SpacesType::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/spaces-types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/spaces-types');
    }

    /**
     * Display the specified resource.
     *
     * @param SpacesType $spacesType
     * @throws AuthorizationException
     * @return void
     */
    public function show(SpacesType $spacesType)
    {
        $this->authorize('admin.spaces-type.show', $spacesType);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SpacesType $spacesType
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SpacesType $spacesType)
    {
        $this->authorize('admin.spaces-type.edit', $spacesType);


        return view('admin.spaces-type.edit', [
            'spacesType' => $spacesType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSpacesType $request
     * @param SpacesType $spacesType
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSpacesType $request, SpacesType $spacesType)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SpacesType
        $spacesType->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/spaces-types'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/spaces-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySpacesType $request
     * @param SpacesType $spacesType
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySpacesType $request, SpacesType $spacesType)
    {
        $spacesType->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySpacesType $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySpacesType $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SpacesType::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
