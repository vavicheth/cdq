<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistic extends Model
{
    use SoftDeletes;

    protected $fillable = ['duty_id','department_id','beds','et_payant','et_gratuit','et_credit','et_bss','et_hef','et_indigent','sortant','rt_payant','rt_gratuit','rt_credit','rt_bss','rt_hef','rt_indigent','dispo','sida','hiv','dece'];
    protected $hidden = [];

    public function duty(){

        return $this->belongsTo('App\Duty');
    }

    public function department(){

        return $this->belongsTo('App\Department');
    }

}
