<?php

namespace App\Contracts;


/**
 * Interface ProductContract
 * @package App\ProductContract
 */
interface ProductContract
{
    /**
    *@param string $order
    *@param string $sort
    *@param array $columns
    *@return mixed
    */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
    *@param int $id
    *@return mixed
    */
    public function findProductById(int $id);

    /**
    *@param array $params
    *@return mixed
    */
    public function createProduct(array $params);
   
    /**
    *@param array $params
    *@return mixed
    */
    public function updateProduct(array $params);

    /**
    *@param int $id

    *@return boolean
    */
    public function deleteProduct(int $id);

    public function findProductBySlug($slug);
}