<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
     protected $table = 'CCSJ_PROD.AT_ADMI_TERM';
     public $incrementing = false;
     protected $primaryKey = [
       'NAME_ID', 'TERM_ID'
     ];

     public function scopeHasEmpty($query, $field)
     {
        return $query->whereNull($field);
     }

     public function scopeInTerm($query, $value)
     {
        return $query->where('TERM_ID', $value);
     }

     public function scopeIsFirstTime($query)
     {
       $first_time = ['HS', 'AH', 'GE'];

        return $query->whereIn('ETYP_ID', $first_time);
     }

     public function scopeIsActive($query)
     {
       $active = ['IQ', 'AP', 'PA', 'RA', 'FA', 'RE'];

        return $query->whereIn('ADST_ID', $active);
     }

     public function scopeIsTrad($query)
     {

        return $query->where('PRGM_ID1', 'TRAD');
     }
}
