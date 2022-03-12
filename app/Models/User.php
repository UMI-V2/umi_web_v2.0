<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


/**
 * @SWG\Definition(
 *      definition="User",
 *      required={"name", "username", "jenis_kelamin", "tanggal_lahir", "no_hp", "foto", "email", "password", "id_privilege", "id_status_pengguna"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="username",
 *          description="username",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_kelamin",
 *          description="jenis_kelamin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_lahir",
 *          description="tanggal_lahir",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_hp",
 *          description="no_hp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="foto",
 *          description="foto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="id_privilege",
 *          description="id_privilege",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_status_pengguna",
 *          description="id_status_pengguna",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'username',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_hp',
        'foto',
        'email',
        'password',
        'id_privilege',
        'id_status_pengguna'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'username' => 'string',
        'jenis_kelamin' => 'string',
        'tanggal_lahir' => 'string',
        'no_hp' => 'string',
        'foto' => 'string',
        'email' => 'string',
        'password' => 'string',
        'email_verified_at' => 'datetime',
        'id_privilege' => 'integer',
        'id_status_pengguna' => 'integer'
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'username' => 'required',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'no_hp' => 'required|numeric',
        'foto' => 'required',
        'email' => 'required',
        'password' => 'required',
        'id_privilege' => 'required',
        'id_status_pengguna' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function master_privilege()
    {
        return $this->belongsTo(\App\Models\master_privilege::class, 'id_privilege');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_status_user()
    {
        return $this->belongsTo(\App\Models\master_status_user::class, 'id_status_pengguna');
    }
}
