<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['code' => 'SUB101', 'name' => 'Mathematics'],
            ['code' => 'SUB102', 'name' => 'Physics'],
            ['code' => 'SUB103', 'name' => 'Chemistry'],
            ['code' => 'SUB104', 'name' => 'Computer Science'],
            ['code' => 'SUB105', 'name' => 'English'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
