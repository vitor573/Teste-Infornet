<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $table = 'Servicos';

    public function servicoPrestadores()
    {
        return $this->hasMany(ServicoPrestador::class, 'servico_id');
    }
}
