<?php

namespace Cms\Base;

use App\Http\Controllers\Controller;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use ApiResponseHelpers;

    protected BaseRepository $baseRepository;

    public function __construct(BaseRepository $baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->respondWithSuccess($this->baseRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $model = new $this->baseRepository->model($request->all());
        $model = $this->baseRepository->save($model);
        return $this->respondCreated($model);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        return $this->respondWithSuccess($this->baseRepository->get($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse // TODO: CHANGE FOR VALIDATION CLASS
    {
        $model = $this->baseRepository->get($id);
        $model->fill($request->all());
        $this->baseRepository->save($model);
        return $this->respondWithSuccess($model);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(int $id): JsonResponse
    {
        $model = $this->baseRepository->delete($id);
        return $this->respondWithSuccess($model);
    }
}
