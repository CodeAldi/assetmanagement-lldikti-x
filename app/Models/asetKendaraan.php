<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class asetKendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'aset_kendaraan';

    /**
     * Get the aset that owns the asetKendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aset(): BelongsTo
    {
        return $this->belongsTo(Aset::class);
    }
}
