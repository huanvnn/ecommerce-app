<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Contracts\AttributeContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class AttributeRepository extends BaseRepository implements AttributeContract
{

    public function __construct(Attribute $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
    *@param string $order
    *@return string $sort
    *@package var3
    *@return mixed
    */
    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
       return $this->all($columns, $order, $sort);
    }

    /**
    *@param int $id
    *@return var2
    *@package var3
    *@return miexd
    */
    public function findAttributeById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $th) {
            throw new ModelNotFoundException($th);    
        }
    }

    /**
    *@param array $params
    *@return miexd
    */
    public function createAttribute(array $params)
    {
        try {
            $collection = collect($params);
            $is_filterable = $collection->has('is_filterable',) ? 1 : 0;
            $is_required = $collection->has('is_required',) ? 1 : 0;

            $merge = $collection->merge(compact('is_filterable', 'is_required'));

            $attribute = new Attribute($merge->all());
            return $attribute;
        } catch (QueryException $th) {
            throw new InvalidAgumentException($th->getMessage());
            
        }
    }

    /**
    *@param array $params
    *
    *
    *@return mixed
    */
    public function updateAttribute(array $params)
    {
        $attribute = $this->findOneByOrFail($params['id']);

        $collection = collect($params)->except('_token');
        $is_filterable = $collection->has('is_filterable') ? 1: 0;
        $is_required = $collection->has('is_required') ? 1: 0;

        $merge  =  $collection->merge(compact('is_filterable', 'is_required'));

        $attribute->update($merge->all());

        return $attribute;
    }

    /**
    *@param int $id
    *@return bool
    */
    public function deleteAttribute(int $id)
    {
        $attribute = $this->findOneByOrFail($id);
        
        $attribute->delete();

        return $attribute;
    }

}