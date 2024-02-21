<?php

namespace Cms\Base\repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
  public function all(): Collection;
  public function save(Model $model): Model;
  public function delete(int $id): Model;
  public function find(int $id): Model;
  public function update(array $attributes, int $id): Model;
}
