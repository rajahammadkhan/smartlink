<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalTypes extends Model
{
    use HasFactory;
    protected $table = 'legal_types';
    protected $fillable = ['type'];
}
