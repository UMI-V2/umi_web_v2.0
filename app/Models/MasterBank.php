<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class MasterBank
 * @package App\Models
 * @version July 28, 2022, 12:06 pm WIB
 *
 * @property string $name
 * @property string $description
 * @property integer $cost_admin
 * @property string $logo
 */
class MasterBank extends Model
{
    use SoftDeletes;


    public $table = 'master_banks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'cost_admin',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'cost_admin' => 'integer',
        'logo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'cost_admin' => 'required',
        'logo' => 'required'
    ];

    public function getLogoAttribute()
    {
        if ($this->attributes['logo']) {
            return url('') . Storage::url($this->attributes['logo']);
        } else {
            return null;
        }
    }
    
}
