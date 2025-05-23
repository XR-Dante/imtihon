<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $fillable = [
        'balance_id',
        'user_id',
        'name',
        'status',
        'description',
        'balance',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }
}
