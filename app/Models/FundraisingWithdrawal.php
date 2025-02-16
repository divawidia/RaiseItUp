<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundraisingWithdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'fundraising_id',
        'fundraiser_id',
        'has_received',
    ];

    public function fundraising()
    {
        return $this->belongsTo(Fundraising::class);
    }

    public function fundraiser()
    {
        return $this->belongsTo(Fundraiser::class);
    }
}
