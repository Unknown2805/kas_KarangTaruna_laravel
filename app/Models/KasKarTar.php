<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\KasMasjidController;

class KasKarTar extends Model
{
    use HasFactory;
    protected $table = 'kas_kartar';

    protected $fillable = [
        'tanggal',
        'uraian',
        'masuk',
        'keluar',
        'jenis'
    ];

}



