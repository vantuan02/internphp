<?php

namespace App\Repositories\Repository;

use App\Models\Subject;
use App\Repositories\BaseRepository;

class SubjectRepository extends BaseRepository
{

    public function __construct(Subject $subject)
    {
        parent::__construct($subject);
    }
    public function getSubject($page)
    {
      return $this->model->paginate($page);
    }
}
