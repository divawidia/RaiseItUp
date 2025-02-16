<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Assuming fundraisers have a name or other fields
    ];

    public function fundraisings()
    {
        return $this->hasMany(Fundraising::class);
    }
}
