<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestador extends Model
{
    use HasFactory;
    protected $table = 'prestadores';

    public function servico_prestador()
    {
        return $this->hasMany(ServicoPrestador::class, 'prestador_id');
    }
}
