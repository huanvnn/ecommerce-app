<?php

namespace App\Contracts;

/**
 * interface CategoryContract
 * @package App\Contracts
 */
interface CategoryContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id);

    /**
     * @param array $params
     * 
     */
    public function createCategory(array $params);

    /**
     * @param array $params
     */
    public function updateCategory(array $params);

    /**
     * @param $int $id
     */
    public function deleteCategory(int $id);

    public function treeList();

    public function findBySlug($slug);
}
