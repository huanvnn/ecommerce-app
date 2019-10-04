<?php

namespace App\Repositories;

use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ProductRepository extends BaseRepository implements ProductContract
{
    use UploadAble;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
    *@param string $order
    *@param string $sort
    *@param array $columns
    *@return mixed
    */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
      return  $this->all($columns, $order, $sort);
    }

    /**
    *@param int $id
    *@return mixed
    */
    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
;
    }

    /**
    *@param array $params
    *@return mixed
    */
    public function createProduct(array $params)
    {
        try {
        $collection  = collect($params);

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('featured', 'status'));

        $product = new Product($merge->all());

        $product->save();

        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }

        return $product;
            
        } catch (QueryException $th) {
            throw new InvalidArgumentException($th->getMessage());   
        }

    }
   
    /**
    *@param array $params
    *@return mixed
    */
    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['product_id']);

         $collection  = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('featured', 'status'));

        $product->update($merge->all());


        if ($collection->has('categories')) {
            $product->categories()->sync('categories');
        }

        return $product;

    }

    /**
    *@param int $id

    *@return boolean
    */
    public function deleteProduct(int $id)
    {
        $product = $this->findOneByOrFail($id);

        $product->delete();

        return $product;
    }

    public function findProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return $product;
    }
}