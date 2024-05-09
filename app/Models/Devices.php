<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devices extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'devices';
    protected $fillable = ['name','unique_number','customer_id','android_master_mac_address','pcb_controller_bluetooth_name','device_category','synchronised_asset_code','installation_date','date_of_supply','status','asset_assign'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }   
}
