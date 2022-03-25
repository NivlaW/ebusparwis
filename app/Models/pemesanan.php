<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $fillable = [
        'mulai',
        'selesai',
        'id_bus',
        'id_client',
    ];

    public function client()
    {
        return $this->belongsTo(client::class, 'id_client');
    }
    
    public function ebus()
    {
        return $this->belongsTo(ebus::class, 'id_bus');
    }
}
