<?php

namespace Cms\Base\controller;

use App\Http\Controllers\Controller;
use Cms\Base\repository\BaseRepository;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller implements IBaseController
{
    use ApiResponseHelpers;

    public readonly BaseRepository $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->respondWithSuccess($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();
        $model = new $this->repository->model($data);
        return $this->respondCreated($this->repository->save($model));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        return $this->respondWithSuccess($this->repository->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        return $this->respondWithSuccess($this->repository->update($data, $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->respondWithSuccess($this->repository->delete($id));
    }
}
