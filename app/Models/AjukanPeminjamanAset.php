<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjukanPeminjamanAset extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'ajukan_peminjaman_aset';

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function aset(){
        return $this->belongsTo(Aset::class,'id_aset');
    }
}
