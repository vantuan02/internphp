<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all($page);
    public function find($id);
    public function findOrFail($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function first($id);
}
