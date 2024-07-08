<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StdClass extends Model
{
    use HasFactory;

    protected $table = 'stdclasses';

        protected $fillable = [
            'class_name' ,
            'class_status' ,
        ];
}
