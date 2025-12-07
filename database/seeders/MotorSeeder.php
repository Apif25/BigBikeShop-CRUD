<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Motor;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   {
        motor::create([
            'id_motor'=>'601',
            'id'=>'4',
            'nama_motor'=>'Ninja ZX-6R',
            'merk'=> 'Kawasaki',
            'cc'=>'636',
            'warna'=>'Biru',
            'qty'=>'1',
            'harga'=>'350000000.00',
        ]);

            motor::create([
            'id_motor'=>'602',
            'id'=>'6',
            'nama_motor'=>'CBR650R',
            'merk'=> 'Honda',
            'cc'=>'649',
            'warna'=>'Merah',
            'qty'=>'1',
            'harga'=>'290000000.00',
        ]);

            motor::create([
            'id_motor'=>'603',
            'id'=>'2',
            'nama_motor'=>'CBR1000RR',
            'merk'=> 'Honda',
            'cc'=>'1084',
            'warna'=>'Hitam',
            'qty'=>'1',
            'harga'=>'485000000.00',
        ]);

            motor::create([
            'id_motor'=>'604',
            'id'=>'4',
            'nama_motor'=>'Panigale V2',
            'merk'=> 'Ducati',
            'cc'=>'955',
            'warna'=>'Merah',
            'qty'=>'1',
            'harga'=>'670000000.00',
        ]);

            motor::create([
            'id_motor'=>'605',
            'id'=>'5',
            'nama_motor'=>'GSX-S1000',
            'merk'=> 'Suzuki',
            'cc'=>'999',
            'warna'=>'Biru',
            'qty'=>'1',
            'harga'=>'390000000.00',
        ]);
    }
}

