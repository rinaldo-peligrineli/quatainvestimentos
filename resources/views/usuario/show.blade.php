@extends('layouts.master')
<html>
    <head>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <body>
        <div class="container">
        <div class="text-center">
            <h1>Visualizar Usuario</h1>
        </div>
            
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" value="{{$objUsuario->nome_usuario}}" readonly>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" value="{{$objUsuario->email}}" readonly>
        </div>
        
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" value="{{$objUsuario->senha}}" readonly>
        </div>
        
        <div class="form-group">
            <label for="nivelAcesso">Nivel de Acesso</label>
            <input type="text" class="form-control" id="nivel_acesso" value="{{$objUsuario->nivelAcesso->nivel_acesso}}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" value="{{ ($objUsuario->status == 1 ? 'Ativo' : 'Inativo') }}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Idade</label>
            <input type="text" class="form-control" id="idade" value="{{ $objUsuario->idade }}" readonly>
        </div>

        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="text" class="form-control" id="saldo" value="R$ {{ number_format($objUsuario->saldo,2,',','.') }}" readonly>
        </div>

        <div class="form-group">
            <label for="saldo">Observações</label>
            <textarea rows="5" cols="6" class="form-control" id="observacoes" readonly> {{$objUsuario->observacoes }} </textarea>
        </div>
    </body>
</html>