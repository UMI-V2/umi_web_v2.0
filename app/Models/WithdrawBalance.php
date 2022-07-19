<?php

namespace App\Models;

use App\Models\Business;
use App\Models\MasterBank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawBalance extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'id_user',
        'id_usaha',
        'id_bank',
        'bank_name',
        'no_rek',
        'rek_name',
        'cost_admin',
        'status',
        'note',
        'nominal_request',
        'total_withdraw',
    ];

    protected $appends = ['business', 'bank'];


    public function getBusinessAttribute()
    {
        return Business::find($this->id_usaha);
    }

    public function getBankAttribute()
    {
        return MasterBank::find($this->id_bank);
    }
}
