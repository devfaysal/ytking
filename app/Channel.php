<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['user_id', 'channel_name', 'channel_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statistics()
    {
        return $this->hasMany(Statistics::class);
    }
}
