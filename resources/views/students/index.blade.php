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

  <table border="1">
    <tr>
      <td>Term</td>
      <!-- <td>NextFallTerm</td> -->
      <td>DfltId</td>
      <td>LastName</td>
      <td>FirstName</td>
      <td>Stud Status</td>
      <td>EntryType</td>
      <td>CdivId</td>
      <td>PrgmId1</td>
      <td>MajorCode</td>
      <td>MajorDesc</td>
      <!-- <td>AorWInNextFall</td> -->
    </tr>

    <!--  Want the non-returners!-->
    @foreach ($students as $student)
      <!-- @if ($student->AorWInTerm == 'FALSE') -->
        <tr>
          <td>{{ $student->TERM_ID }}</td>
          <!-- <td>{{ $student->NextFallTerm }}</td> -->
          <td>{{ $student->DFLT_ID }}</td>
          <td>{{ $student->LAST_NAME }}</td>
          <td>{{ $student->FIRST_NAME }}</td>
          <td>{{ $student->STUD_STATUS }}</td>
          <td>{{ $student->ETYP_ID }}</td>
          <td>{{ $student->CDIV_ID }}</td>
          <td>{{ $student->PRGM_ID1 }}</td>
          <td>{{ $student->MAMI_ID_MJ1 }}</td>
          <td>{{ $student->DESCR }}</td>
          <!-- <td>{{ $student->AorWInNextFall }}</td> -->
        </tr>
      @endif

    @endforeach
  </table>

</body>
</html>
