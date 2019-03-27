<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProspectsController extends Controller
{
    public function index()
    {
      $term = '20191';
      // $active = ['IQ', 'AP', 'PA', 'RA', 'FA', 'RE'];
      $fields = ['TERM_ID', 'DFLT_ID', 'LAST_NAME', 'FIRST_NAME', 'DATE_BIRTH', 'ADST_ID', 'ETYP_ID', 'PRGM_ID1', 'MAMI_ID_MAJOR', 'DESCR'];
      // $first_time = ['HS', 'AH', 'GE'];

      // Join Prospect with CCSJ_PROD.CCSJ_CO_V_NAME on NAME_ID
      // $prospects_sql_orig = \App\Prospect::join('CCSJ_PROD.CCSJ_CO_V_NAME', 'CCSJ_PROD.CCSJ_CO_V_NAME.NAME_ID', '=', 'CCSJ_PROD.AT_ADMI_TERM.NAME_ID')
      //   ->leftJoin('CCSJ_PROD.CO_MAJOR_MINOR', 'CCSJ_PROD.CO_MAJOR_MINOR.MAMI_ID', '=', 'CCSJ_PROD.AT_ADMI_TERM.MAMI_ID_MAJOR')
      //   ->where('TERM_ID', $term)
      //   // ->where('ADST_ID', '<>', 'XX')
      //   ->whereIn('ADST_ID', $active)
      //   ->whereIn('ETYP_ID', $first_time)
      //   // ->whereNull('PRGM_ID1')
      //   ->select($fields);
        // ->select('TERM_ID', 'DFLT_ID', 'LAST_NAME', 'FIRST_NAME', 'ADST_ID', 'ETYP_ID', 'PRGM_ID1', 'MAMI_ID_MAJOR', 'DESCR')
        // ->get();
        // ->first();

        $prospects_sql = \App\Prospect::join('CCSJ_PROD.CCSJ_CO_V_NAME', 'CCSJ_PROD.CCSJ_CO_V_NAME.NAME_ID', '=', 'CCSJ_PROD.AT_ADMI_TERM.NAME_ID')
          // ->join('CCSJ_PROD.CO_MAJOR_MINOR', 'CCSJ_PROD.CO_MAJOR_MINOR.MAMI_ID', '=', 'CCSJ_PROD.AT_ADMI_TERM.MAMI_ID_MAJOR')
          ->leftJoin('CCSJ_PROD.CO_MAJOR_MINOR', 'CCSJ_PROD.CO_MAJOR_MINOR.MAMI_ID', '=', 'CCSJ_PROD.AT_ADMI_TERM.MAMI_ID_MAJOR')
          ->inTerm($term)
          ->isActive()
          ->isFirstTime()
          ->isTrad()
          ->orderBy('LAST_NAME', 'asc')
          ->orderBy('FIRST_NAME', 'asc')
          ->select($fields);

        // $prospects = $prospects_sql->paginate(50);
        // dd($prospects_sql->simplePaginate(50));
        $prospects = $prospects_sql->get();
        // dd($prospects->get());
        // dd($prospects);

        $number_of_records = $prospects_sql->count();
        // $number_of_empty_prgmid1_records = $prospects_sql->hasEmpty('PRGM_ID1')->count();
        // $number_of_empty_entry_type_records = $prospects_sql->hasEmpty('ETYP_ID')->count();
        // $first_time_active = $prospects->get();

        // dd($first_time_active);

        $data = [
          'prospects' => $prospects,
          'number_of_records' => $number_of_records,
          // 'number_of_empty_prgmid1_records' => $number_of_empty_prgmid1_records,
          // 'number_of_empty_entry_type_records' => $number_of_empty_entry_type_records,
        ];

        // dd($data);
        // dd($count);
        // dd($prospects->first());
        // dd($prospects->get()->first());
        // dd($prospects->count());

        return view('prospects.index', $data);

    }
}
