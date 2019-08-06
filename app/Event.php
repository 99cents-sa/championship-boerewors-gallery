<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['event_name', 'event_description'];

    public function images() {
        return $this->hasMany(Image::class);
    }
}
