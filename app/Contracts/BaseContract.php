<?php

namespace App\Contracts;

interface BaseContract
{
    /**
     * Create a instance model
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a instance model
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(int $id, array $attributes);

    /**
     * Return all model rows
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return miexd
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc');
    
    /**
     * Find one by ID
     * @param int $id
     * @return miexd
     */
    public function find(int $id);

    /**
     * Find one by ID or throw exceptions
     * @param int $id
     * @return miexd
     */
    public function findOneOrFail(int $id);

    /**
     * Find based on diffence columm
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data);
    
    /**
     * Find one based on diffence columm
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data);

        /**
     * Find one based on a different column or through exception
     * @param array $data
     * @return mixed
     */
    public function findOneByOrFail(array $data);

    /**
     * Delete one by Id
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}