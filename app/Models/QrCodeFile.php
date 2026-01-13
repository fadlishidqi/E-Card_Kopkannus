<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrCodeFile extends Model
{
    protected $fillable = ['member_id', 'qr_code_path'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}