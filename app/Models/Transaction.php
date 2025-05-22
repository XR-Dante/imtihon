<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $fillable = [
        'name',
        'balance_id',
        'status',
        'description',
        'balance',
        'date',
    ];

    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }
}
