<style>
  body {
    font-family: Arial, sans-serif;
    background: #f9fafb;
    color: #333;
    padding: 20px;
  }

  h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    color: #2c3e50;
  }

  form {
    max-width: 700px;
    margin: 0 auto 2rem auto;
    background: #fff;
    padding: 1.5rem 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: center;
    justify-content: center;
  }

  select, input[type="date"] {
    padding: 8px 12px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    min-width: 160px;
    transition: border-color 0.3s;
  }

  select:hover, input[type="date"]:hover,
  select:focus, input[type="date"]:focus {
    border-color: #007BFF;
    outline: none;
  }

  button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 25px;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    min-width: 120px;
  }

  button:hover {
    background-color: #0056b3;
  }

  table {
    width: 700px;
    max-width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #007BFF;
    color: white;
  }

  tbody tr:hover {
    background-color: #f1f8ff;
  }

  @media (max-width: 720px) {
    form {
      flex-direction: column;
      max-width: 100%;
      padding: 1rem;
    }

    select, input[type="date"], button {
      width: 100%;
      min-width: unset;
    }

    table {
      width: 100%;
    }
  }
</style>

<h2>Attendance Dashboard</h2>

<form method="GET">
  <select name="subject_id" aria-label="Filter by subject">
    <option value="">All Subjects</option>
    @foreach($subjects as $subject)
      <option value="{{ $subject->id }}" {{ $subjectId == $subject->id ? 'selected' : '' }}>
        {{ $subject->name }}
      </option>
    @endforeach
  </select>

  <input type="date" name="from_date" value="{{ $from }}" aria-label="From date">
  <input type="date" name="to_date" value="{{ $to }}" aria-label="To date">

  <button type="submit">Search</button>
</form>

<table>
  <thead>
    <tr>
      <th>Student</th>
      <th>Attendance %</th>
    </tr>
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
