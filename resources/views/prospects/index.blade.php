<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Active Prospects</title>
</head>
<body>
<h1>First-time TRAD Active prospects</h1>
<p>There are {{ $number_of_records }} total records in this category.</p>
  <table border="1">
    <tr>
      <td>Term</td>
      <td>DfltId</td>
      <td>LastName</td>
      <td>FirstName</td>
      <td>DOB</td>
      <td>AdmissionsStatus</td>
      <td>EntryType</td>
      <td>PrgmId1</td>
      <td>ExpectedMajorCode</td>
      <td>ExpectedMajorDesc</td>
    </tr>

    @foreach ($prospects as $prospect)
    <tr>
      <td>{{ $prospect->TERM_ID }}</td>
      <td>{{ $prospect->DFLT_ID }}</td>
      <td>{{ $prospect->LAST_NAME }}</td>
      <td>{{ $prospect->FIRST_NAME }}</td>
      <td>{{ $prospect->DATE_BIRTH }}</td>
      <td>{{ $prospect->ADST_ID }}</td>
      <td>{{ $prospect->ETYP_ID }}</td>
      <td>{{ $prospect->PRGM_ID1 }}</td>
      <td>{{ $prospect->MAMI_ID_MAJOR }}</td>
      <td>{{ $prospect->DESCR }}</td>
    </tr>

    @endforeach
  </table>


</body>
</html>
