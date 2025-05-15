<style>
  body {
    font-family: Arial, sans-serif;
    background: #f9fafb;
    color: #333;
    padding: 20px;
  }

  h2 {
    text-align: center;
    margin-bottom: 1rem;
    color: #2c3e50;
  }

  form {
    max-width: 600px;
    margin: 0 auto 2rem auto;
    background: #fff;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  select, input[type="date"] {
    width: 100%;
    padding: 8px 12px;
    margin: 0.5rem 0 1rem 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    box-sizing: border-box;
    transition: border-color 0.3s;
  }

  select:hover, input[type="date"]:hover,
  select:focus, input[type="date"]:focus {
    border-color: #007BFF;
    outline: none;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1rem;
  }

  th, td {
    padding: 10px 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #007BFF;
    color: white;
  }

  tr:hover {
    background-color: #f1f8ff;
  }

  button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  button:hover {
    background-color: #0056b3;
  }

  /* Responsive */
  @media (max-width: 640px) {
    table, th, td {
      font-size: 14px;
    }
  }
</style>

<h2>Mark Attendance</h2>

<form method="GET">
  <label for="subject-select" style="font-weight: bold;">Select Subject</label>
  <select id="subject-select" name="subject_id" onchange="this.form.submit()">
    <option value="">-- Select Subject --</option>
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

  <label for="attendance-date" style="font-weight: bold;">Date</label>
  <input type="date" id="attendance-date" name="date" required value="{{ date('Y-m-d') }}">

  <table>
    <thead>
      <tr>
        <th>Student</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
        <tr>
          <td>{{ $student->name }}</td>
          <td>
            <select name="attendance[{{ $student->id }}]" aria-label="Attendance status for {{ $student->name }}">
              <option value="1">Present</option>
              <option value="2">Absent</option>
            </select>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <button type="submit">Save Attendance</button>
</form>
@endif
