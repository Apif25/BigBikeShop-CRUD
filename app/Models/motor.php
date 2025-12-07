<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motor extends Model
{
    protected $table = 'motor';
    protected $primaryKey = 'id_motor';
    public $incrementing = true;
    protected $fillable = [
        'nama_motor',
        'merk',
        'cc',
        'warna',
        'stock',
        'harga',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
