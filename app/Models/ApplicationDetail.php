<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    /***********************************************/
    // Mutators
    /***********************************************/
    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = new \DateTime($value);
    }

    /***********************************************/
    // Relations
    /***********************************************/
    public function application()
    {
        return $this->belongsTo('applications');
    }
}
