<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class References extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'references';
    protected $fillable = ['account_name','unique_number','legal_type_id','incorporation_number','ntn_number','strn_number','set_commision_percentage','reference_user_account','reference_user_password','status',
    'bank_name','iban','devices_sold','revenue','country_id','address','contact_number'];

    public function legalType()
    {
        return $this->belongsTo(LegalTypes::class);
    }

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
}
