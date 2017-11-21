<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $guarded = ['id'];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
