<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstrutorController extends Controller
{
    public $instrutor;

    public function __construct(Instrutor $instrutor)
    {
        $this->instrutor = $instrutor;
    }

    public function index()
    {
        $instrutores = $this->instrutor->all();
        return response()->json($instrutores, 200);
    }

    public function store(Request $request)
    {
        $request->validate($this->instrutor->Regras(), $this->instrutor->Feedback());

        $imagem = $request->file('foto');
        $imagem_url = $imagem->store('imagem', 'public');

        $instrutor = $this->instrutor->create([
            'nome' => $request->nome,
            'foto' => $imagem_url
        ]);

        return response()->json($instrutor, 200);
    }


     /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $instrutor = $this->instrutor->find($id);
        if ($instrutor === null) {
            return response()->json(['Error' => 'Não existe dados para esse instrutor'], 404);
        }
        return response()->json($instrutor, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $instrutor = $this->instrutor->find($id);
        if ($instrutor === null) {
            return response()->json(['Error' => 'Impossível realizar a atualização. O instrutor não existe'], 404);
        }

        $request->validate($this->instrutor->Regras(), $this->instrutor->Feedback());

        if ($request->file('foto') == true) {
            Storage::disk('public')->delete($instrutor->foto);
        }

        $imagem = $request->file('foto');
        $imagem_url = $imagem->store('imagem', 'public');

        $instrutor->update([
            'nome' => $request->nome,
            'foto' => $imagem_url
        ]);

        return response()->json($instrutor, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $instrutor = $this->instrutor->find($id);
        if ($instrutor === null) {
            return response()->json(['Erro' => 'Impossível deletar o registro. O instrutor não existe'], 404);
        }

        Storage::disk('public')->delete($instrutor->foto);

        $instrutor->delete();
        return response()->json(['msg' => 'O registro foi deletado com sucesso'], 200);
    }
}
