<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $hidden = [
        'id'
    ];

    public function publicProfile()
    {
        return $this->belongsTo(PublicProfile::class);
    }
}
