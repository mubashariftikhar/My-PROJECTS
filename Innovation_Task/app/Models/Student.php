<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }
    public function stdclass()
    {
        return $this->belongsTo(Stdclass::class);
    }

    // public function country()
    // {
    //     return $this->belongsTo(Country::class);
    // }
}
