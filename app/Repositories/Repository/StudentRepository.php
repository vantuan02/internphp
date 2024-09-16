<?php

namespace App\Repositories\Repository;

use App\Jobs\SendStudentLoginInfoJob;
use App\Models\Student;
use App\Models\User;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentRepository extends BaseRepository
{
    protected $user;

    public function __construct(Student $students, User $user)
    {
        parent::__construct($students);

        $this->user = $user;
    }

    public function getAllStudent($page, $param)
    {
        $students = $this->model::with(['department:id,name', 'subjects', 'user:id,name,email'])->withCount("subjects");

        if (isset($param['from_age']) && $param['from_age'] >= 0) {
            $age = Carbon::now()->subYears($param['from_age'])->toDateString();
            $students->where('birthday', "<=", $age);
        }
        if (isset($param['to_age']) && $param['to_age'] >= 0) {
            $age = Carbon::now()->subYears($param['to_age'])->toDateString();
            $students = $students->where('birthday', ">=", $age);
        }

        if (isset($param['from_score']) || isset($param['to_score'])) {
            $students = $students->whereHas('subjects', function ($query) use ($param) {
                $query->selectRaw('student_id, AVG(score) as gpa')
                    ->groupBy('student_id')
                    ->when(isset($param['from_score']), function ($query) use ($param) {
                        $query->having('gpa', '>=', $param['from_score']);
                    })
                    ->when(isset($param['to_score']), function ($query) use ($param) {
                        $query->having('gpa', '<=', $param['to_score']);
                    });
            });
        }

        if (isset($param['type_phone'])) {
            $patterns = array_map(function ($type) {
                return match ($type) {
                    'viettel' => '^(03|09)[0-9]{8}$',
                    'mobi' => '^(02|08)[0-9]{8}$',
                    'vina' => '^(07)[0-9]{8}$',
                };
            }, $param['type_phone']);
            // dd($patterns);
            $students->where('phone', 'regexp', implode('|', $patterns));
        }
        return $students->paginate($page);
    }

    public function createStudent($attributes)
    {
        try {

            DB::beginTransaction();

            [
                'email' => $attributes['email'],
                'name' => $attributes['name'],
                'password' => $attributes['password'],
            ];
            $user = $this->user->create($attributes);

            if (isset($attributes['image'])) {
                $url = Storage::put('public', $attributes['image']);
            } else {
                $url = '';
            }

            $attributes['user_id'] = $user->id;
            $attributes['image'] = basename($url);

            $student = $this->model->create($attributes);

            SendStudentLoginInfoJob::dispatch($user);

            DB::commit();
            return $student;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateStudent($id, $attributes)
    {
        $student = $this->model->findOrFail($id);
        
        DB::beginTransaction();
        try {
            $user = $student->user;
            $user->update($attributes);
            if (isset($attributes['image'])) {
                $url = Storage::put('public', $attributes['image']);
            
                // Kiểm tra và xóa tệp tin cũ
                if (!empty($student->image) && Storage::exists('public' . $student->image)) {
                    Storage::delete('public' . $student->image);
                }
            } else {
                // Giữ lại đường dẫn hình ảnh cũ nếu không có tệp tin mới
                $url = $student->image;
            }

            $attributes['image'] = basename($url);
            $student->update($attributes);

            DB::commit();
            return $student;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function registerSubjects($idSubject)
    {
        $student = $this->model->findOrFail(Auth::user()->student->id);
        if (is_array($idSubject)) {
            foreach ($idSubject as $subject) {
                $student->subjects()->attach($subject);
            }
        } else {
            $student->subjects()->attach($idSubject);
        }

        return true;
    }

    public function unRegisterSubjects($idSubject)
    {
        $student = $this->model->findOrFail(Auth::user()->student->id);
        $student->subjects()->detach($idSubject);
        return true;
    }

    public function updateScore($idStudent, $scoreSubject)
    {
        $student = $this->model->findOrFail($idStudent);

        DB::beginTransaction();
        try {
            $syncData = collect($scoreSubject['subjects'])
                ->combine($scoreSubject['scores'])
                ->mapWithKeys(function ($score, $subjectId) {
                    return [$subjectId => ['score' => $score]];
                })
                ->toArray();

            $student->subjects()->sync($syncData);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}