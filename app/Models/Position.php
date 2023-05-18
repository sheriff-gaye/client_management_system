<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $tbale = 'positions';
    protected $fillable = ['position_name', 'status'];

    public function candidate()
    {
        return $this->hasMany(Candidate::class );
    }
}
