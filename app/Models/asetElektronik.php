<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class asetElektronik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'aset_elektronik';

    /**
     * Get the aset that owns the asetElektronik
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aset(): BelongsTo
    {
        return $this->belongsTo(Aset::class);
    }
}
