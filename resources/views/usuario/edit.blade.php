@extends('layouts.master')
<html>
    <head>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    </head>

    <body>
        <div class="container">
        <div class="tituloAplicacao">
            <h3>Editar Usuário</h3>
        </div>  
        
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{$objUsuario->nome_usuario}}">
            <input type="hidden" class="form-control" id="id" name="id" value="{{$objUsuario->id}}">
            
            {{csrf_field()}}
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$objUsuario->email}}">
        </div>
        
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" value="{{$objUsuario->senha}}">
        </div>
        
        <div class="form-group">
            <label for="status">Nivel Acesso</label>
            <select class="form-control" name="nivel_acesso" id="nivel_acesso">
                <option value="">Selecione</option>
                @foreach($objNivelAcesso as $objDado)
                <option value="{{$objDado->id}}" {{($objDado->id == $objUsuario->nivel_acesso_id) ? 'selected' : '' }}> {{$objDado->nivel_acesso}}</option>
                
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="">Selecione</option>
                <option value="1" {{($objUsuario->status == 1 ? 'selected' : '') }}>Ativo</option>
                <option value="0" {{($objUsuario->status == 0 ? 'selected' : '') }}>Inativo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Idade</label>
            <input type="text" class="form-control" name="idade" id="idade" value="{{ $objUsuario->idade }}">
        </div>

        <div class="form-group">
            <label for="saldo">Saldo em R$</label>
            <input type="text" class="form-control" name="saldo" id="saldo" value="{{ number_format($objUsuario->saldo,2,',','.') }}">
        </div>

        <div class="form-group">
            <label for="saldo">Observações</label>
            <textarea rows="5" cols="6" class="form-control" name="observacao" id="observacao"> {{$objUsuario->observacoes }} </textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" onClick="atualizarUsuario()">Atualizar</button>
        </div>
    
    </body>
</html>
