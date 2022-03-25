<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class ebus extends Model
{
    use HasFactory;

    protected $table = 'ebus';
    protected $fillable = [
        'no',
        'id_jenis',
        'bed',
        'deskripsi',
        'harga',
        'gambar',
        'status',
    ];

    public function jenis()
    {
        return $this->belongsTo(jenis::class, 'id_jenis');
    }
}
