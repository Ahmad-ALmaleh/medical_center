<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'appointment_id',
        'patient_id',
        'clinic_id',
        'amount',
        'payment_status',
        'payment_method',
        'issued_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    /* ======================
       العلاقات
    ====================== */

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function issuer()
    {
        return $this->belongsTo(Employee::class, 'issued_by');
    }
}
