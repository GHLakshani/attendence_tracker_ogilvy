<h2>Attendance Dashboard</h2>

<form method="GET">
    <select name="subject_id">
        <option value="">All Subjects</option>
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" {{ $subjectId == $subject->id ? 'selected' : '' }}>
                {{ $subject->name }}
            </option>
        @endforeach
    </select>

    <input type="date" name="from_date" value="{{ $from }}">
    <input type="date" name="to_date" value="{{ $to }}">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr><th>Student</th><th>Attendance %</th></tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            @php
                $percentage = $student->total ? round(($student->present / $student->total) * 100, 2) : 0;
            @endphp
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $percentage }}%</td>
            </tr>
        @endforeach
    </tbody>
</table>
