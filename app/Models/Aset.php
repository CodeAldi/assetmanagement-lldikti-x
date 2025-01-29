<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Aset extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'aset';

    /**
     * Get the alternatif associated with the Aset
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alternatif(): HasOne
    {
        return $this->hasOne(Alternatif::class);
    }

    /**
     * Get the elektronik associated with the Aset
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function elektronik(): HasOne
    {
        return $this->hasOne(asetElektronik::class);
    }
    /**
     * Get the kendaraan associated with the Aset
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kendaraan(): HasOne
    {
        return $this->hasOne(asetKendaraan::class);
    }

    /**
     * Get all of the hasilAkhir for the Aset
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function hasilAkhir(): HasManyThrough
    {
        return $this->hasManyThrough(hasilAkhir::class, Alternatif::class);
    }
    /**
     * Get all of the feedbackPeminjaman for the Aset
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbackPeminjaman(): HasMany
    {
        return $this->hasMany(FeedbackPengembalian::class);
    }
}
