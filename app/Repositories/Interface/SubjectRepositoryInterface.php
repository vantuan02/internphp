<?php

namespace App\Repositories\Interface;

use App\Repositories\BaseRepositoryInterface;

interface SubjectRepositoryInterface extends BaseRepositoryInterface {
    public function getSubjects($page);
}
?>