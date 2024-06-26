<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoPrestador extends Model
{
    use HasFactory;
    protected $table = 'servico_prestador';

    public function prestador()
    {
        return $this->belongsTo(Prestador::class, 'idPrestador');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'idServico');
    }
}
