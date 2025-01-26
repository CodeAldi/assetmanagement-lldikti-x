<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
