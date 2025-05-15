<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['name' => 'Sandali Munasinghe', 'email' => 'sandali@deakin.lk', 'contact_no' => '0773636648', 'subject' => 'English'],
            ['name' => 'Thiyuni Siyathma', 'email' => 'thiyuni@deakin.lk', 'contact_no' => '0773636645', 'subject' => 'Chemistry'],
            ['name' => 'Hansini Gunasekara', 'email' => 'hansini@deakin.lk', 'contact_no' => '0773636644', 'subject' => 'Mathematics'],
        ];

        foreach ($teachers as $data) {
            $teacher = Teacher::create($data);

            // Assign 2 random subjects to each teacher
            $subjectIds = Subject::inRandomOrder()->limit(2)->pluck('id');
            $teacher->subjects()->attach($subjectIds);
        }
    }
}
