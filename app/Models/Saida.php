<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $fillable = [
        'produto_id',
        'quantidade',
        'setor',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}