<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilAkhir extends Model
{
    use HasFactory;
    protected $table = 'hasil_akhir';

    /**
     * Get the alternatif that owns the NilaiKriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Alternatif::class);
    }
}
