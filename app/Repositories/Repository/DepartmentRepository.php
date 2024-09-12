<?php
namespace App\Repositories\Repository;

use App\Models\Department;
use App\Repositories\BaseRepository;

class DepartmentRepository extends BaseRepository{

    public function __construct(Department $departments){
        parent::__construct($departments);
    }
    
    public function getDepartments(){
        return $this->model->pluck('name', 'id');
    }
}

?>