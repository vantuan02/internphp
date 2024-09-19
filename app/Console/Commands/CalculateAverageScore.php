<?php

namespace App\Console\Commands;

use App\Mail\StatusNotification;
use App\Models\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CalculateAverageScore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calculate-average-score';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $students = Student::whereHas('subjects', function ($query) {
            $query->whereNotNull('student_subject.score');
        })->get();

        foreach ($students as $student) {
            $averageScore = $student->subjects->avg('pivot.score');

            if ($averageScore < 5) {

                Mail::to($student->user->email)->send(new StatusNotification($student, $averageScore));

                $student->update(['status' => '1']);
            }
        }
    }
}
