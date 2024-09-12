<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface StudentRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllStudent($page, $param);
    public function createStudent($attributes);
    public function updateStudent($id, $attributes);
    public function registerSubjects($idSubject);
    public function unRegisterSubjects($idSubject);
    public function updateScore($idStudent, $scoreSubject);

}
