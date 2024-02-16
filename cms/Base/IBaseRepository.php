<?php

namespace Cms\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository 
{
  public function all(): Collection;
  public function get(): Model;
  public function save(Model $model): Model;
  public function delete(Model $model): Model;
}