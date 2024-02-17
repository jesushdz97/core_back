<?php

namespace Cms\Base;

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

    public function get(int $id): Model
    {
        $model = $this->model->newQuery()->find($id);
        if (!$model) throw new HttpException(Response::HTTP_NOT_FOUND, 'Resource Not Found');
        return $model;
    }

    public function save(Model $model): Model
    {
        $model->save();
        return $model;
    }

    public function delete(int $id): Model
    {
        $model = $this->model->newQuery()->find($id);
        if (!$model) throw new HttpException(Response::HTTP_NOT_FOUND, 'Resource Not Found');
        $model->delete();
        return $model;
    }
}
