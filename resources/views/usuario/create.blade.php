@extends('layouts.master')
<!doctype html>
<html>
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>

    <script>
        
    </script> 
    <style>
       
        .titulo {
            background-color:#3c5f41; 
            color:#FFFFFF;
        }
    </style>  
    </head>  
        <body>
        <div class="container">
        <div class="text-center">
            <h1>Cadastrar Usuário</h1>
        </div>
        
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="">
            <input type="hidden" class="form-control" id="id" name="id" value="">
            
            {{csrf_field()}}
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="">
        </div>
        
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" value="">
        </div>
        
        <div class="form-group">
            <label for="status">Nivel Acesso</label>
            <select class="form-control" name="nivel_acesso" id="nivel_acesso">
                <option value="">Selecione</option>
            @foreach($objNivelAcesso as $objDado)
                <option value="{{$objDado->id}}"> {{$objDado->nivel_acesso}}</option>
                
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="">Selecione</option>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Idade</label>
            <input type="text" class="form-control" name="idade" id="idade" value="">
        </div>

        <div class="form-group">
            <label for="saldo">Saldo em R$</label>
            <input type="text" class="form-control" name="saldo" id="saldo" value="">
        </div>

        <div class="form-group">
            <label for="saldo">Observações</label>
            <textarea rows="5" cols="6" class="form-control" name="observacao" id="observacao"> </textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" onClick="cadastrarUsuario()">Cadastrar</button>
        </div>
    
    </body>
</html>  
 