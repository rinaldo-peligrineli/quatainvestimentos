@extends('layouts.master')
<!doctype html>
<head>
    <body>
</head>    
<html>
    <body>
        <div class="container">
            <div class="tituloAplicacao">
                <h3>Listar Usuários</h3>
            </div>   
    
        <div class="container">  
            @if(Session::get('message'))
                <div class="alert alert-danger alert-dismissible" id="alertUsuarioCriadaSucesso">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Erro!</h4>
                    {{ Session::get('message') }} 
                </div>
            @endif 
            <div class="row">
                <div class="col-sm-6">
                    <h3>Usuários</h3>
                    {{csrf_field()}}
                   
                    <a class="btn btn-primary btn-sm" href="{{ route('usuario.create') }}" role="button">Cadastrar Usuario</a>
                    @if (Route::has('login'))
                        <div class="top-right links">
                    @auth
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
                </div>
                
            </div>
        </div>   
        <br/>
        <table class="table table-striped table-sm table-bordered table-hover">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Nivel de Acesso</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
         
            <tbody>
                @foreach($objUsuarios as $objUsuario)
                <tr>
                    <th scope="row">{{$objUsuario->id}}</th>
                    <td>{{$objUsuario->nome_usuario}}</td>
                    <td>{{$objUsuario->nivelAcesso->nivel_acesso}}</td>
                    <td>{{ ($objUsuario->status == 1) ? 'Ativo' : 'Inativo'}} </td>
                    <td>
                        <a href="{{ route('usuario.show', ['id' =>  $objUsuario->id]) }}" class="btn btn-success btn-sm">Visualizar</a>
                        @auth
                            <a href="{{ route('usuario.edit', ['id' =>  $objUsuario->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <a onClick="deletarRegistro({{$objUsuario->id}})" class="btn btn-danger btn-sm">Deletar </a>
                        @else    
                            <a href="{{ route('usuario.edit', ['id' =>  $objUsuario->id]) }}" class="btn btn-warning btn-sm disabled" aria-disabled="true">Editar</a>
                            <a onClick="deletarRegistro({{$objUsuario->id}})" class="btn btn-danger btn-sm disabled" aria-disabled="true">Deletar </a>
                        @endauth
                    </td>    
                </tr>
                @endforeach
            </tbody>
        </table>    
    </body>
</html> 