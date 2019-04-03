<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enrolled Students</title>
</head>
<body>
<h1>Spring 2019 to Fall 2019 TRAD Retention</h1>

<p>There are the following PRGM_ID1 codes in use:</p>
<ul>
  @foreach ($codes as $code)
  <li>{{ $code }}</li>
  @endforeach

</ul>

<p>The current term is {{ $current_term }}. The next Fall term is computed as {{ $next_fall_term }}.</p>
<p>There are {{ $total_non_returners }} TRAD non-returners as of {{ $today }}.</p>

  <table border="1">
    <tr>
      <!-- <td>Term</td> -->
      <!-- <td>NextFallTerm</td> -->
      <th>DfltId</th>
      <th>LastName</th>
      <th>FirstName</th>
      <th>Stud Status</th>
      <th>EntryType</th>
      <th>CdivId</th>
      <th>PrgmId1</th>
      <th>MajorCode</th>
      <th>MajorDesc</th>
      <th>NumCcsjSports</th>
      <th>IsSrAthlete</th>
    </tr>

    <!--  Want the non-returners!-->
    @foreach ($students as $student)
      <!-- @if ($student->a_or_w_in_next_fall == 'FALSE') -->
        <tr>
          <!-- <td>{{ $student->TERM_ID }}</td> -->
          <!-- <td>{{ $student->next_fall_term }}</td> -->
          <td>{{ $student->DFLT_ID }}</td>
          <td>{{ $student->LAST_NAME }}</td>
          <td>{{ $student->FIRST_NAME }}</td>
          <td>{{ $student->STUD_STATUS }}</td>
          <td>{{ $student->ETYP_ID }}</td>
          <td>{{ $student->CDIV_ID }}</td>
          <td>{{ $student->PRGM_ID1 }}</td>
          <td>{{ $student->MAMI_ID_MJ1 }}</td>
          <td>{{ $student->DESCR }}</td>
          <td>{{ $student->num_ccsj_sports }}</td>
          <td>{{ $student->is_sr_athlete }}</td>
        </tr>
      @endif

    @endforeach
  </table>

</body>
</html>
