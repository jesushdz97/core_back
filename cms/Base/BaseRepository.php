<?php

namespace Cms\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class BaseRepository implements IBaseRepository
{
  protected $model;
  private $relations;

  public function __construct(Model $model, array $relations = [])
  {
    $this->model = $model;
    $this->relations = $relations;
  }

  public function all(): Collection
  {
    $query = $this->model->newQuery();

    if (!empty($this->relations)) {
      $query = $query->with($this->relations);
    }

    return $query->get();
  }

  public function get(int $id): Model
  {
    return $this->model->find();
  }

  public function save(Model $model): Model
  {
    $model->save();
    return $model;
  }

  public function delete(Model $model): Model
  {
    $model->delete();
    return $model;
  }
}
