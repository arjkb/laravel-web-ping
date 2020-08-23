<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downtime extends Model
{
    public function site() {
        return $this->belongsTo(Site::class);
    }
}
