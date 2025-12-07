<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = [
        'id',
        'id_motor',
        'nama_motor',
        'merk',
        'cc',
        'warna',
        'qty',
        'harga',

    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor', 'id_motor');
    }
}
