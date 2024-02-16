<?php

namespace Cms\Base;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


// TODO: ALL METHOD RETURNS SHOULD BE JSON
class BaseController extends Controller
{
  protected BaseRepository $baseRepository;

  public function __construct(BaseRepository $baseRepository)
  {
    $this->baseRepository = $baseRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $this->baseRepository->all();
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) // TODO: CHANGE FOR VALIDATION CLASS
  {
    $model = new $this->baseRepository->model($request->all());
    $this->baseRepository->save($model);
  }

  /**
   * Display the specified resource.
   */
  public function show(int $id)
  {
    $this->baseRepository->get($id);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Model $model) // TODO: CHANGE FOR VALIDATION CLASS
  {
    $model->fill($request->all());
    $model = $this->baseRepository->save($model);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Model $model)
  {
    $model = $this->baseRepository->delete($model);
  }
}