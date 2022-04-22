<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicProfile extends Model
{
    use HasFactory;
    protected $hidden = [
        'id'
    ];

    protected $table = 'public_profiles';

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'public_profile_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function preference()
    {
        return $this->belongsTo(Preference::class);
    }

    public function AlbumImage()
    {
        return $this->hasMany(AlbumImage::class, 'public_profile_id', 'user_id');
    }
}
