<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($page)
    {
        return $this->model->paginate($page);
    }
    
    public function getAll(){
    return $this->model->all();
    }

    /**
     * Find a record by its ID.
     *
     * @param int $id
     * @return Model|null
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function findOrFail($id)
    {
      return $this->model->findOrFail($id);
    }
    
    public function first($id, $attribute = "id")
    {
        return $this->model->where($attribute, $id)->first();
    }

    /**
     * Create a new record.
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing record.
     *
     * @param int $id
     * @param array $data
     * @return Model|null
     */
    public function update($id, array $data, $attribute = "id")
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Delete a record.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
