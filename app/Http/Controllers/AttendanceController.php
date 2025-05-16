<?php
namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showForm(Request $request)
    {
        $subjects = Subject::all();
        $subjectId = $request->get('subject_id');

        $students = collect(); // use empty collection by default

        if ($subjectId) {

            $subject = Subject::find($subjectId);

            if ($subject) {
                $students = $subject->students; // assuming relation exists
            }

            // dd($students);
        }

        return view('attendance.form', compact('subjects', 'students', 'subjectId'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'attendance' => 'required|array',
        ]);



        foreach ($request->attendance as $studentId => $status) {
            // dd($status);
            Attendance::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'subject_id' => $request->subject_id,
                    'attendance_date' => $request->date
                ],
                ['present' => $status]
            );
        }

        return redirect()->back()->with('success', 'Attendance saved successfully.');
    }
}
