<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 *
 * @package App
 * @property string $name
 * @property string $name_kh
 * @property string $abr
 * @property integer $beds
 * @property string $description
 * @property tinyInteger $active
*/
class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'name_kh', 'abr', 'beds', 'description', 'active','order'];
    protected $hidden = [];


    public static function boot()
    {
        parent::boot();

        Department::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setBedsAttribute($input)
    {
        $this->attributes['beds'] = $input ? $input : null;
    }

    public function statistic(){

        return $this->hasMany('App\Statistic');
    }

}
