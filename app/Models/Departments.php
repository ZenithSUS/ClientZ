<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = [
        'name', 
        'description',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
}
