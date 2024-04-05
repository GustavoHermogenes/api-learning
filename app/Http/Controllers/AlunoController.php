<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlunoController extends Controller
{

    public $aluno;

    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //$aluno = Aluno::all();

    $aluno = $this->aluno->all();

    return response()->json($aluno, 200);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->aluno->Regras(),$this->aluno->Feedback());

        $imagem = $request->file('foto');

        $imagem_url = $imagem->store('imagem', 'public');

        // dd($imagem_url);

        $aluno = $this->aluno->create([
                'nome' => $request->nome,
                'foto' => $imagem_url
            ]);

        return response()->json($aluno, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $aluno = $this -> aluno -> find($id);

        if($aluno === null){
            return response()->json(['Error' => 'Não existe dados para esse aluno'], 404);
        }

        return response()->json($aluno, 200);
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

        $aluno = $this->aluno->find($id);

        // dd($request->nome);
        // dd($request->file('foto'));

        if($aluno === null){
            return response()->json(['Error' => 'impossivel realizar a atualização. O aluno não existe'], 404);
        }

        if($request->method() === 'PATCH'){

            // return['teste' => 'PATCH'];

            $dadosDinamico = [];

            foreach($aluno->Regras() as $input => $regra){

                if(array_key_exists($input, $request->all())){
                    $dadosDinamico[$input] = $regra;
                }

                // dd($dadosDinamico);

            }

            $request->validate($dadosDinamico, $this->aluno->Feedback());

        }else{
            $request->validate($this->aluno->Regras(), $this->aluno->Feedback());
        }

        if($request->file('foto') == true) {
            Storage::disk('public')->delete($aluno->foto);
        }

        $imagem = $request->file('foto');
        $imagem_url = $imagem ->store('imagem', 'public');

        $aluno ->update([
            'nome' =>$request->nome,
            'foto' =>$imagem_url
        ]);

        return response()->json($aluno, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $aluno = $this->aluno->find($id);

        if($aluno === null){
            return response()->json(['Erro' => 'impossivel deletar o registro. O aluno não existe'], 404);
        }

        Storage::disk('public')->delete($aluno->foto);

        $aluno->delete();
        return response()->json(['msg' => 'O registro foi deletado com sucesso'], 200);
    }
}
