<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Emergency extends Model
{
    protected $table = 'emergency';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'phone',
        'longitude',
        'latitude',
        'address',
        'details',
        'severity_status',
        'status',
        'remarks',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function severity()
    {
        return $this->belongsTo(SeverityStatus::class, 'severity_status', 'id');
    }

    public function statusCase()
    {
        return $this->belongsTo(CaseStatus::class, 'status', 'id');
    }

    protected static function booted()
    {
        static::creating(function ($emergency) {
            if (Auth::check()) {
                $emergency->user_id = Auth::id();
            }else{
                $emergency->user_id = null;
            }
        });
    }
}
