<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'posX',
        'posY',
    ];

    public function connectionsFrom()
    {
        return $this->hasMany(Connection::class, 'ubicacion1_id');
    }

    public function connectionsTo()
    {
        return $this->hasMany(Connection::class, 'ubicacion2_id');
    }
}
