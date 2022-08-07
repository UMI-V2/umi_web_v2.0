<?php

namespace App\Models;

use App\Models\User;
use App\Models\Business;
use App\Models\MasterBank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class WithdrawBalance
 * @package App\Models
 * @version July 28, 2022, 8:24 pm WIB
 *
 * @property \App\Models\User $idUser
 * @property \App\Models\Business $idUsaha
 * @property \App\Models\MasterBank $idBank
 * @property integer $id_user
 * @property integer $id_usaha
 * @property integer $id_bank
 * @property integer $nominal_request
 * @property integer $no_rek
 * @property integer $rek_name
 * @property integer $bank_name
 * @property integer $cost_admin
 * @property integer $total_withdraw
 * @property string $status
 * @property integer $note
 */
class WithdrawBalance extends Model
{
    use SoftDeletes;


    public $table = 'withdraw_balances';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_user',
        'id_usaha',
        'id_bank',
        'nominal_request',
        'no_rek',
        'rek_name',
        'bank_name',
        'cost_admin',
        'total_withdraw',
        'status',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'id_usaha' => 'integer',
        'id_bank' => 'integer',
        'nominal_request' => 'integer',
        'no_rek' => 'integer',
        'rek_name' => 'string',
        'bank_name' => 'string',
        'cost_admin' => 'integer',
        'total_withdraw' => 'integer',
        'status' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_user' => 'required',
        'id_usaha' => 'required',
        'id_bank' => 'required',
        'nominal_request' => 'required',
        'no_rek' => 'required',
        'rek_name' => 'required',
        'bank_name' => 'required',
        'cost_admin' => 'required',
        'total_withdraw' => 'required',
        'status' => 'required',
        'note#' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businesses()
    {
        return $this->belongsTo(Business::class, 'id_usaha', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function master_banks()
    {
        return $this->belongsTo(MasterBank::class, 'id_bank', 'id');
    }
}
