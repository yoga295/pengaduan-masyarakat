<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'tgl_pengaduan',
        'nik',
        'judul',
        'isi_laporan',
        'lokasi',
        'foto',
        'status',
    ];

    protected $casts  = ['tgl_pengaduan'=>'datetime'];

    public function user(){
        return $this->hasOne(Masyarakat::class,'nik','nik');
    }
}
