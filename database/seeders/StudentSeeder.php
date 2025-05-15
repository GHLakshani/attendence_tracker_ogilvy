<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Subject;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $student = Student::create([
                'reg_no' => 'REG00' . $i,
                'name' => 'Student ' . $i,
                'nic' => '1990658781 ' . $i,
        ]);

        // Enroll each student in 3 random subjects
        $subjectIds = Subject::inRandomOrder()->limit(3)->pluck('id');
        $student->subjects()->attach($subjectIds);
    }
    }
}
