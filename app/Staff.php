<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Staff
 *
 * @package App
 * @property string $title
 * @property string $name
 * @property string $name_kh
 * @property string $gender
 * @property string $dob
 * @property string $staff_code
 * @property string $phone
 * @property string $email
 * @property string $department_code
 * @property tinyInteger $active
*/
class Staff extends Model
{
    use SoftDeletes;


    protected $table = "staff";
    protected $fillable = ['name', 'name_kh', 'gender', 'dob', 'staff_code', 'phone', 'email', 'active', 'title_id', 'department_code_id'];
    protected $hidden = [];


    public static function boot()
    {
        parent::boot();

        Staff::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTitleIdAttribute($input)
    {
        $this->attributes['title_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDobAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['dob'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['dob'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDobAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setDepartmentCodeIdAttribute($input)
    {
        $this->attributes['department_code_id'] = $input ? $input : null;
    }

    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id')->withTrashed();
    }

    public function department_code()
    {
        return $this->belongsTo(Department::class, 'department_code_id')->withTrashed();
    }
    public function duty(){
        return $this->belongsToMany('App\Duty');
    }

}
