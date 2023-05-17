<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;

    /**
     * Get the associated read.
     */
    public function read(): HasOne
    {
        return $this->hasOne(Read::class);
    }

}
