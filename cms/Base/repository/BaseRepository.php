<?php

namespace Cms\Base\repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseRepository implements IBaseRepository
{
    public Model $model;
    private array $relations;

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

    public function find(int $id): Model
    {
        return $this->model->newQuery()->find($id) ?? throw new HttpException(Response::HTTP_NOT_FOUND, 'Not Found');
    }

    public function save(Model $model): Model
    {
        $model->save();
        return $model;
    }

    public function update(array $attributes, int $id): Model
    {
        $model = $this->find($id);
        $model = $model->fill($attributes);
        $model->save();
        return $model;
    }

    public function delete(int $id): Model
    {
        $model = $this->find($id);
        $model->delete();
        return $model;
    }

    public function findByAttributes(array $attributes): ?Model
    {
        $query = $this->buildQueryByAttributes($attributes);
        return $query->first();
    }

    public function getByAttributes(array $attributes): Collection
    {
        $query = $this->buildQueryByAttributes($attributes);
        return $query->get();
    }

    private function buildQueryByAttributes(array $attributes)
    {
        $query = $this->model->newQuery();

        foreach ($attributes as $field => $value) {
            $query = $query->where($field, $value);
        }

        return $query;
    }
}
