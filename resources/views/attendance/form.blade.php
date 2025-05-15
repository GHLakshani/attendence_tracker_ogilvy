<h2>Mark Attendance</h2>

<form method="GET">
    <select name="subject_id" onchange="this.form.submit()">
        <option value="">Select Subject</option>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $subjectId == $subject->id ? 'selected' : '' }}>
                {{ $subject->name }}
            </option>
        @endforeach
    </select>
</form>

@if(!empty($students) && $students->count())
<form method="POST" action="{{ route('attendance.submit') }}">
    @csrf
    <input type="hidden" name="subject_id" value="{{ $subjectId }}">
    <input type="date" name="date" required value="{{ date('Y-m-d') }}">
    <table>
        <tr><th>Student</th><th>Status</th></tr>

        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>
                    <select name="attendance[{{ $student->id }}]">
                        <option value="1">Present</option>
                        <option value="2">Absent</option>
                    </select>
                </td>
            </tr>
        @endforeach
    </table>
    <button type="submit">Save Attendance</button>
</form>
@endif
