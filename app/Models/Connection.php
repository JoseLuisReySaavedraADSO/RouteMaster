<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ubicacion1_id',
        'ubicacion2_id',
        'peso',
    ];

    public function location1()
    {
        return $this->belongsTo(Location::class, 'ubicacion1_id');
    }

    public function location2()
    {
        return $this->belongsTo(Location::class, 'ubicacion2_id');
    }
}
