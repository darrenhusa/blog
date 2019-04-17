<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enrolled Students</title>
</head>
<body>
<h1>Spring 2019 TRAD Enrolled</h1>

  <table border="1">
    <tr>
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

    @foreach ($students as $student)
        <tr>
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

    @endforeach
  </table>

</body>
</html>
