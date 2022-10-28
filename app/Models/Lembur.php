<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $fillable = [
        'name',
        'nip',
        'dari',
        'sampai',
        'waktu',    
        'kgtn' => "Lembur",
        'urai',
    ];
    public $timestamps = true;
}
