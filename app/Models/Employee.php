<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'job_title',
        'salary',
        'hired_at',
        'status',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
        'hired_at' => 'date',
    ];

    /* ======================
       العلاقات
    ====================== */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'issued_by');
    }
}
