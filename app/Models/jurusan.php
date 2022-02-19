<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class jurusan
 * @package App\Models
 * @version February 19, 2022, 6:00 pm UTC
 *
 * @property string $nama_jurusan
 */
class jurusan extends Model
{


    public $table = 'jurusans';
    



    public $fillable = [
        'nama_jurusan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_jurusan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
