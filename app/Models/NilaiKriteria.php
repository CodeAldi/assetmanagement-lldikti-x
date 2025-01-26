<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiKriteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'nilai_kriteria';

    /**
     * Get the alternatif that owns the NilaiKriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Alternatif::class);
    }/**
     * Get the kriteria that owns the NilaiKriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(kriteria::class);
    }

}
