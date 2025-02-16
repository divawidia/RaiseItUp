<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraising extends Model
{
    use HasFactory;

    protected $fillable = [
        'fundraiser_id',
        'category_id',
        'is_active',
        'has_finished',
        'name',
        'slug',
        'thumbnail',
        'about',
        'target_amount',
    ];

    public function fundraiser()
    {
        return $this->belongsTo(Fundraiser::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function phases()
    {
        return $this->hasMany(FundraisingPhase::class);
    }

    public function donations()
    {
        return $this->hasMany(Donatur::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(FundraisingWithdrawal::class);
    }
}
