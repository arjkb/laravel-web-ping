<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downtime extends Model
{
    public $timestamps = false;

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    protected $fillable = [
        'started_at',
        'ended_at',
    ];

    public function site() {
        return $this->belongsTo(Site::class);
    }
}
