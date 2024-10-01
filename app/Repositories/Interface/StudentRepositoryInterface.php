<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface StudentRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllStudent($perPage, $param);
    public function createStudent($attributes);
    public function updateStudent($id, $attributes);
    public function registerSubject($idSubject);
    public function unRegisterSubject($idSubject);
    public function updateScore($idStudent, $scoreSubject);

}
