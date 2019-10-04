<?php

namespace App\Repositories;

use App\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * class BaseRepository
 * @package App\Repositories
 * 
 
 */

class BaseRepository implements BaseContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create a instance model
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a instance model
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(int $id, array $attributes) : bool
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Return all model rows
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return miexd
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }
    
    /**
     * Find one by ID
     * @param int $id
     * @return miexd
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Find one by ID or throw exceptions
     * @param int $id
     * @return miexd
     */
    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Find based on diffence columm
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }
    
    /**
     * Find one based on diffence columm
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

        /**
     * Find one based on a different column or through exception
     * @param array $data
     * @return mixed
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * Delete one by Id
     * @param int $id
     * @return mixed
     */
    public function delete(int $id) : bool
    {
        return $this->model->find($id)->delete();
    }

}