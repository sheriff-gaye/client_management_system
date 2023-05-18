<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'company_name',
        'company_address',
        'company_city',
        'company_zip',
        'company_vat',
        'status',
    ];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
