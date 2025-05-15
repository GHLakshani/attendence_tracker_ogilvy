<?php
namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::all();
        $subjectId = $request->input('subject_id');
        $from = $request->input('from_date') ?? Carbon::now()->subWeek()->format('Y-m-d');
        $to = $request->input('to_date') ?? Carbon::now()->format('Y-m-d');

        $query = Student::query()
            ->withCount(['attendances as total' => function ($q) use ($from, $to, $subjectId) {
                $q->whereBetween('attendance_date', [$from, $to]);
                if ($subjectId) $q->where('subject_id', $subjectId);
            }])
            ->withCount(['attendances as present' => function ($q) use ($from, $to, $subjectId) {
                $q->whereBetween('attendance_date', [$from, $to])->where('present', '1');
                if ($subjectId) $q->where('subject_id', $subjectId);
            }]);

        $students = $query->get();

        return view('dashboard.index', compact('students', 'subjects', 'subjectId', 'from', 'to'));
    }
}
