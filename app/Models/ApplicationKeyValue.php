<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationKeyValue extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'application_key_value';
}
