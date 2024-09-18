<?php

namespace App\Console\Commands;

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
        $students = Student::whereHas('subjects', function($query) {
            // Kiểm tra sinh viên đã học xong tất cả các môn học
            $query->whereNotNull('pivot.score');
        })->get();

        foreach ($students as $student) {
            // Tính điểm trung bình
            $averageScore = $student->subjects->avg('pivot.score');
            
            // Kiểm tra nếu điểm dưới 5
            if ($averageScore < 5) {
                // Đánh dấu sinh viên đã bị thôi học
                $student->update(['status' => 'expelled']);

                // Gửi email thông báo
                Mail::to($student->user->email)->send(new \App\Mail\StatusNotification($student, $averageScore));

                $this->info("Đã gửi email thông báo thôi học cho sinh viên: {$student->user->name}");
            }
        }

        $this->info('Đã tính điểm trung bình và gửi thông báo nếu cần thiết.');
    }
    
}
