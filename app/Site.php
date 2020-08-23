<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $casts = [
        'online' => 'boolean',
    ];

    public function downtimes() {
        return $this->hasMany(Downtime::class);
    }
}
