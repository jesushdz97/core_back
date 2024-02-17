<?php

namespace Cms\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
  public function all(): Collection;
  public function get(int $id): Model;
  public function save(Model $model): Model;
  public function delete(int $id): Model;
}
