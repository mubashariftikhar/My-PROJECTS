<?php

// app/Models/Hospital.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'address', 'zip_code', 'phone', 'official_email', 'website',
        'sub_super_admin_id', 'number_of_beds', 'number_of_staff',
        'established_at', 'white_logo', 'dark_logo', 'primary_color',
        'secondary_color', 'emergency_contact', 'notes', 'city_id', 'country_id',
        'created_by', 'updated_by', 'deleted_by',
    ];

    public function subSuperAdmin()
    {
        return $this->belongsTo(User::class, 'sub_super_admin_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}

