<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    protected $guarded = [];


    public function user()
{
    return $this->belongsTo(User::class, 'usuario_id');
}
    // public function usuario(){
    //     return $this->belongsTo(Users::class, 'comentario_id');
    // }

    // public function hijo(){
    //     return $this->belongsTo(Comentario::class, 'comentario_id');
    // }
}

