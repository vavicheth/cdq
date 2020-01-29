<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Duty extends Model
{
    use SoftDeletes;

    protected $fillable = ['date', 'date_kh','board_duty_id', 'chef_duty_id','chef_salle_id' , 'beds', 'restants', 'dispo', 'payants','examen1','examen2'];
    protected $hidden = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff_board(){

        return $this->belongsTo('App\Staff', 'board_duty_id');
    }
    public function staff_qart(){

        return $this->belongsTo('App\Staff', 'chef_duty_id');
    }
    public function staff_salle(){

        return $this->belongsTo('App\Staff', 'chef_salle_id');
    }

    public function statistic(){
        return $this->hasMany('App\Statistic');
    }

    public function staff(){
        return $this->belongsToMany('App\Staff');
    }

    public function department(){
        return $this->hasManyThrough('App\Department','App\Staff');
    }




}
