<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'alternatif';

    /**
     * Get the aset that owns the Alternatif
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aset(): BelongsTo
    {
        return $this->belongsTo(aset::class, 'aset_id');
    }
}
