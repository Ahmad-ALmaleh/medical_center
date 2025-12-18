<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecordFile extends Model
{
    protected $fillable = [
        'medical_record_id',
        'file_path',
        'file_type',
        'uploaded_by',
    ];

    /* ======================
       العلاقات
    ====================== */

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
