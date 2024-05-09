<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Devices;

class CustomerDevice extends Model
{
    use HasFactory;
    protected $table = 'customer_devices';
    protected $fillable = ['customer_id','device_id','status'];
    public function device(){
        return $this->belongsTo(Devices::class);
    }
}
