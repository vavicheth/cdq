<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Title
 *
 * @package App
 * @property string $title
 * @property string $title_kh
 * @property string $abr
 * @property string $abr_kh
 * @property tinyInteger $active
*/
class Title extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'title_kh', 'abr', 'abr_kh', 'active'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Title::observe(new \App\Observers\UserActionsObserver);
    }
    
}
