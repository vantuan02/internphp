<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $batchSize = 1000; // Batch size để tối ưu insert nhiều dữ liệu
        DB::beginTransaction(); // Bắt đầu transaction

        try {
            for ($i = 0; $i < 100000 / $batchSize; $i++) {
                $students = [];

                for ($j = 0; $j < $batchSize; $j++) {
                    // Tạo tài khoản user trước
                    $user = User::firstOrCreate(
                        ['email' => $faker->unique()->safeEmail], // Điều kiện kiểm tra
                        [
                            'name' => $faker->name,
                            'password' => Hash::make('password'),
                        ]
                    );

                    // Dữ liệu của bảng students
                    $students[] = [
                        'student_code' => $faker->countryCode,
                        'user_id' => $user->id, // Sử dụng ID của user vừa tạo
                        'gender' => $faker->randomElement([0, 1]),
                        'image' => $faker->imageUrl(640, 480),
                        'birthday' => $faker->date,
                        'phone' => $faker->phoneNumber,
                        'address' => $faker->address,
                        'status' => $faker->randomElement([0, 1, 2]),
                        'department_id' => $faker->randomElement([4, 8, 9]),
                        'deleted_at' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                // Insert vào bảng students sau khi đã có users
                Student::insert($students);
            }

            DB::commit(); // Commit transaction nếu không có lỗi
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback nếu có lỗi
            throw $e; // Hiển thị lỗi
        }
    }
}
