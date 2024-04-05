<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Contracts\Service\Attribute\Required;

class Aluno extends Model
{
    protected $fillable = ['nome','foto'];

    public function Regras(){
        return[
            'nome' => 'required|unique:alunos,nome,'.$this->id.'|min:3',
            'foto' => 'required|file|mimes:png,jpg'
        ];
    }

    public function Feedback(){

        return[
        'required' => 'O campo :attribute é obrigatório',
        'foto.mimes' => 'O arquivo deve ser uma imagem PNG ou JPG',
        'nome.unique' => 'O nome do aluno já existe',
        'nome.min' => 'O nome do aluno deve ter mais de 3 caracteres'
        ];

    }



}
