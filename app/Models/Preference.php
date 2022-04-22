<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $hidden = [
        'id'
    ];
    protected $fillable = [
      'user_id',
      'male',
      'female'
    ];

    public function publicProfile()
    {
        return $this->belongsTo(PublicProfile::class);
    }

}
