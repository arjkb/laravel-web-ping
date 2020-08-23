<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downtime extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ended_at',
    ];

    public function site() {
        return $this->belongsTo(Site::class);
    }
}
