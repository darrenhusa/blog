<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = 'CCSJ_PROD.SR_STUDENT_TERM';
  public $incrementing = false;
  protected $primaryKey = [
    'NAME_ID', 'TERM_ID'
  ];

  protected $appends = ['AorWInTerm', 'NextFallTerm'];

  // $this->next_fall_term($this->TERM_ID);

  public function scopeIsAorW($query)
  {
    return $query->whereIn('STUD_STATUS', ['A', 'W']);
  }

  public function scopeInCollege($query, $value)
  {

    if ($value == 'DCP')
    {
      $query->whereIn('PRGM_ID1', ['OR19', 'PM19']);
    }
    else if($value == 'GRAD')
    {
      $query->whereIn('PRGM_ID1', ['MT19', 'MS19', 'PA19', 'MP19']);

    }
    else if($value == 'MTI')
    {
      $query->whereIn('PRGM_ID1', ['MTI']);

    }

    else if($value == 'DUAL')
    {
      $query->whereIn('PRGM_ID1', ['DUAL', 'DGED']);

    }
    else if($value == 'TRAD')
    {
      $query->where('PRGM_ID1', 'like', 'TR%');
      // $query->where('PRGM_ID1', str_contains('TR'));

    }

    return $query;

  }

  public function getAorWInTermAttribute()
  {
    $term = '20191';

    $status = \App\Student::join('CCSJ_PROD.CCSJ_CO_V_NAME', 'CCSJ_PROD.CCSJ_CO_V_NAME.NAME_ID', '=', 'CCSJ_PROD.SR_STUDENT_TERM.NAME_ID')
      ->where('DFLT_ID', $this->DFLT_ID)
      ->where('TERM_ID', $term);

      if ($status->count() == 1)
      {
        $result = "TRUE";
      }
      else
      {
        $result = "FALSE";
      }
      // dd($this->DFLT_ID);
      // dd($status);
      // dd($result);

      return $result;
      // $this->result;
  }

  public function setNextFallTermAttribute($term)
  {
    // parse the term into two part: year_part and term_part
    $year = substr($term, 0, 4);
    $term_frac = substr($term, 4);

    $data = [
      'year' => $year,
      'term_frac' => $term_frac
    ];
      // dd($this->DFLT_ID);
      dd($data);
      // dd($result);

      return $result;
      // $this->result;
  }
}
