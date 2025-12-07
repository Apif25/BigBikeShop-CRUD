<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_motor',
        'nama_motor',
        'jenis',
        'qty',
        'harga',
        'subtotal',
    ];


    const JENIS = ['masuk', 'keluar'];


    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor', 'id_motor');
    }
}
