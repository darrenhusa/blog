<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentsController extends Controller
{
  public function index()
  {
    // $term = '20191';
    $term = '20182';
    $fields = ['TERM_ID', 'DFLT_ID', 'LAST_NAME', 'FIRST_NAME', 'STUD_STATUS', 'CDIV_ID', 'ETYP_ID', 'PRGM_ID1', 'MAMI_ID_MJ1', 'DESCR'];

    // Join Prospect with CCSJ_PROD.CCSJ_CO_V_NAME on NAME_ID
    $trad_students = \App\Student::join('CCSJ_PROD.CCSJ_CO_V_NAME', 'CCSJ_PROD.CCSJ_CO_V_NAME.NAME_ID', '=', 'CCSJ_PROD.SR_STUDENT_TERM.NAME_ID')
      ->leftJoin('CCSJ_PROD.CO_MAJOR_MINOR', 'CCSJ_PROD.CO_MAJOR_MINOR.MAMI_ID', '=', 'CCSJ_PROD.SR_STUDENT_TERM.MAMI_ID_MJ1')
      ->where('TERM_ID', $term)
      ->isAorW()
      ->inCollege('TRAD')
      // ->where('AorWInTerm', 'FALSE')
      ->orderBy('LAST_NAME', 'asc')
      ->orderBy('FIRST_NAME', 'asc')
      ->select($fields);
      // ->paginate(50);
      // ->get();

      $spring_enrolled = $trad_students->get();
      // $spring_enrolled = $trad_students->simplePaginate(50);

      // $students->simplePaginate(50);

      // dd($spring_enrolled->ToArray());

      // $term = '20182';
      $non_returners = $spring_enrolled->where('a_or_w_in_next_fall', 'FALSE');
      $total_non_returners = $spring_enrolled->where('a_or_w_in_next_fall', 'FALSE')->count();
      // $total_non_returners = $spring_enrolled->where('AorWInTerm', 'FALSE')->count();

      // $next_fall_term = $spring_enrolled->pluck('next_fall_term')->unique()->toString();
      $current_term = $spring_enrolled->pluck('TERM_ID')->unique()->first();
      $next_fall_term = $spring_enrolled->pluck('next_fall_term')->unique()->first();
      // $next_fall_term = $spring_enrolled->pluck('next_fall_term')->unique()-toArray();
      // $next_fall_term = $trad_students->value('next_fall_term')->first();

      // dd($next_fall_term);
      // dd($total_non_returners);

      // dd($students->toSql());
      // dd($students->paginate(50)->toSql());
      // dd('hello');
      // $students is a collection ==> use sortBy for a collection!
      $codes = $spring_enrolled->sortBy('PRGM_ID1')->pluck('PRGM_ID1')->unique();
      // dd($codes);
      // dd($students_sql);
      $today = Carbon::today()->toDateString();

      $data = [
        'today' => $today,
        'students' => $non_returners,
        // 'students' => $spring_enrolled,
        'current_term' => $current_term,
        'next_fall_term' => $next_fall_term,
        'codes' => $codes,
        'total_non_returners' => $total_non_returners
      ];

      return view('students.index', $data);
      // return view('students.index', compact('students'));

  }

  public function convert_term()
  {
    $term = '20182';

    // want next fall term from a spring term
    // add 1 to year
    // append 1 to result and return

    // parse the term into two part: year_part and term_part
    $year = (int)substr($term, 0, 4) + 1;

    $term_frac = substr($term, 4);

    $next_fall = (string)$year . '1';

    // $data = [
    //   'term' => $term,
    //   'year' => $year,
    //   'term_frac' => $term_frac,
    //   'next_fall' => $next_fall
    // ];
      // dd($this->DFLT_ID);
      // dd($data);
      // dd($result);

      return $next_fall;
      // $this->result;
  }

}
