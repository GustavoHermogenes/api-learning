<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrutor extends Model
{
    protected $fillable = ['nome', 'foto'];

    public function Regras()
    {
        return [
            'nome' => 'required|unique:instrutores,nome|min:3',
            'foto' => 'required|file|mimes:png,jpg'
        ];
    }

    public function Feedback()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'foto.mimes' => 'O arquivo deve ser uma imagem PNG ou JPG',
            'nome.unique' => 'O nome do instrutor já existe',
            'nome.min' => 'O nome do instrutor deve ter mais de 3 caracteres'
        ];
    }
}
