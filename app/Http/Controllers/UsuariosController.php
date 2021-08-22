<?php

namespace App\Http\Controllers;


use App\Model\Usuario\NivelAcesso;
use App\Model\Usuario\Usuario;
use App\Jobs\CriarArquivo;
use Auth;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    
     /**
     * Show the application index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $objUsuarios = Usuario::all();
        return view('usuario.index', compact('objUsuarios'));
    }

    /**
     * @return \Exception|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function create() {

        $objNivelAcesso = NivelAcesso::all();
        return view('usuario.create', compact('objNivelAcesso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $msg = "";
        try {
            $saldo_sql = str_replace('.', '', $request->get('saldo'));
            $saldo_sql = str_replace(',', '.', $saldo_sql);

            $usuario_data['nome_usuario'] = $request->get('nome');
            $usuario_data['email'] = $request->get('email');
            $usuario_data['senha'] = md5($request->get('senha'));
            $usuario_data['status'] = $request->get('status');
            $usuario_data['idade'] = $request->get('idade');
            $usuario_data['saldo'] = $saldo_sql;
            $usuario_data['observacoes'] = $request->get('observacao');

            $nivelAcesso = NivelAcesso::find($request->get('nivel_acesso'));
            $usuario = new Usuario();
            $usuario->fill($usuario_data);
            $usuario->nivelAcesso()->associate($nivelAcesso);
            $usuario->save(); 
            $msg = "Usuario " . strtoupper($usuario->nome_usuario) . ' Criado com sucesso';  
            
            # Cria o arquivo na pasta public/usuarios/yyyy-mm/id_usuario
            $job = (new CriarArquivo($usuario, 'inserido'));
            dispatch($job);
        } catch(Exception $e) {
            $msg = $e->getMessage();
        }      

        return response()->json(['data' => $msg]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if(!Auth::check()) {
            return redirect()->route('usuario.index')->with('message', "Para alterar um registro, é necessário estar logado");
        } 
        $objUsuario = Usuario::findOrFail($id);
        $objNivelAcesso = NivelAcesso::all();
        return view('usuario.edit', compact('objUsuario'), compact('objNivelAcesso'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $objUsuario = Usuario::findOrFail($id);
        return view('usuario.show', compact('objUsuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $msg = "";
        try {
            $saldo_sql = str_replace('.', '', $request->get('saldo'));
            $saldo_sql = str_replace(',', '.', $saldo_sql);

            $id = $request->get('id');
            $nome = $request->get('nome');
            $email = $request->get('email');
            $senha = md5($request->get('senha'));
            $nivel_acesso_id = $request->get('nivel_acesso');
            $status = $request->get('status');
            $idade = $request->get('idade');
            
            $observacoes = $request->get('observacao');
            $usuario = Usuario::find($id);

            $usuario->nome_usuario = $nome;
            $usuario->senha = $senha;
            $usuario->email = $email;
            $usuario->nivel_acesso_id = $nivel_acesso_id;
            $usuario->status = $status;
            $usuario->idade = $idade;
            $usuario->saldo = $saldo_sql;
            $usuario->observacoes = $observacoes;


            $usuario->save();
            
            # Atualiza o arquivo na pasta public/usuarios/yyyy-mm/id_usuario
            $job = (new CriarArquivo($usuario, 'alteração'));
            dispatch($job);

            $msg = "Usuario " . strtoupper($usuario->nome_usuario) . ' Atualizado com sucesso';  

            
        } catch(Exception $e) {
            $msg = $e->getMessage();
        }    
          
        return response()->json(['data' => $msg]);
        
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $msg = "";
        try {
            if(!Auth::check()) {
                return redirect()->route('usuario.index')->with('message', "Para excluir um registro, é necessário estar logado");
            } 

            $usuario = Usuario::findOrFail($id);
            
            # Atualiza o arquivo na pasta public/usuarios/yyyy-mm/id_usuario
            $job = (new CriarArquivo($usuario,'exclusão'));
            dispatch($job);

            $usuario->delete();
            $msg = "Usuario " . strtoupper($usuario->nome_usuario) . ' Excluido com sucesso';  
            
            

        } catch(Exception $e) {
            $msg = $e->getMessage();
        }    
          
        return response()->json(['data' => $msg]);    
    }

    
}