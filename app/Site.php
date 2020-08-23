<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $appends = [
        'css_color',
        'status_word',
    ];

    protected $casts = [
        'online' => 'boolean',
    ];

    public function getCssColorAttribute() {
        return $this->online ? 'success' : 'danger';
    }

    public function getStatusWordAttribute() {
        return $this->online ? 'ONLINE' : 'OFFLINE';
    }

    public function downtimes() {
        return $this->hasMany(Downtime::class);
    }
}
