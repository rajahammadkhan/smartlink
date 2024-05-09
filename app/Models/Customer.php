<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'customers';
    protected $fillable = ['name','unique_number','legal_type_id','incorporation_number','ntn_number','strn_number','email','password','allowed_user','current_user',
    'unique_reference_id','billed_by','domain_url','status','country_id'];

    public function legalType()
    {
        return $this->belongsTo(LegalTypes::class);
    }

    public function references()
    {
        return $this->belongsTo(References::class, 'unique_reference_id');
    }    

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
}
