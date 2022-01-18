<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /***********************************************/
    // Relations
    /***********************************************/

    public function user()
    {
        return $this->hasOne('user_id');
    }

    public function detail()
    {
        return $this->hasOne(ApplicationDetail::class);
    }

    public function medicalHistory()
    {
        return $this->belongsToMany(MedicalHistory::class);
    }

    public function lifestyle()
    {
        return $this->belongsToMany(Lifestyle::class);
    }
}
