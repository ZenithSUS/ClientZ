<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'company_id',
        'department_id',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
}
