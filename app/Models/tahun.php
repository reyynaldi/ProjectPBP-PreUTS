<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    protected $table =  'tahun_ajaran';
    protected $primaryKey = 'kode_tahun';
    public $incrementing = false; // Non-incrementing jika primary key bukan integer
    protected $keyType = 'string'; // Jika kode_fakultas adalah string, atur tipe key menjadi string
    protected $fillable = [
        'kode_tahun',
        'bag_semester',
        'tahun_akademik',
        'status',
    ];

    public function irs(){
        return $this->belongsTo(Tahun::class, 'tahun_akademik', 'kode_tahun');
    }
}
