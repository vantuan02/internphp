<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\DefaultValueBinder;
use Maatwebsite\Excel\Validators\Failure;

class StudentsImport extends DefaultValueBinder implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    protected $rows = [];
    protected $studentIds = [];
    protected $subjectIds = [];
    protected $errors = [];
    protected $currentRow = 2;

    public function __construct()
    {
        $this->studentIds = Student::pluck('id')->toArray();
        $this->subjectIds = Subject::pluck('id')->toArray();
    }

    public function model(array $row)
    {
        $isValid = true;

        if (!in_array($row['student_id'], $this->studentIds)) {
            $this->errors[] = "Row " . $this->currentRow . ": The student_id: " . $row['student_id'] . " invalid";
            $isValid = false;
        }

        if (!in_array($row['subject_id'], $this->subjectIds)) {
            $this->errors[] = "Row " . $this->currentRow . ": The subject_id: " . $row['subject_id'] . " invalid";
            $isValid = false;
        }

        if ($isValid) {
            $this->rows[] = [
                'student_id' => $row['student_id'],
                'subject_id' => $row['subject_id'],
                'score' => $row['score']
            ];

            if (count($this->rows) >= $this->batchSize()) {
                $this->upsertRows();
            }
        }
        $this->currentRow++;
    }

    protected function upsertRows()
    {
        if (!$this->errors) {
            DB::table('student_subject')->upsert(
                $this->rows,
                ['student_id', 'subject_id'],
                ['score']
            );
            $this->rows = [];
        }
    }

    public function __destruct()
    {
        if (!empty($this->rows)) {
            $this->upsertRows();
        }
    }

    public function rules(): array
    {
        return [
            '*.student_id' => 'required',
            '*.subject_id' => 'required',
            '*.score' => 'nullable|numeric|min:0|max:10',
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            $this->errors[] = "Row " . $failure->row() . ": " . implode(", ", $failure->errors());
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}