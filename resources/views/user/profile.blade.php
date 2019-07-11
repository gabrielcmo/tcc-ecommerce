@extends('layouts.default')

@section('title', 'Perfil')

@section('stylesheets')
  <link href="{{ asset('/css/styleHome.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <form method="post" action="/perfil/update" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                    <div class="form-group col-md-12">
                        @if($user->image !== null)
                            <img src="/img/avatars/{{$user->image}}" class="rounded float-left" width="200px" height="200px" class="rounded mx-auto d-block" alt="Foto de perfil">
                        @else
                            <p>Voce nao tem foto</p>
                        @endif
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputEmail">Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp" placeholder="{{ $user->email }}">
                        <small id="emailHelp" class="form-text text-muted">Nós nunca divulgaremos seu email a ninguém</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputName">Nome</label>
                        <input type="text" name="name" class="form-control" id="InputName" placeholder="{{ $user->name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="InputPass">Senha</label>
                        <input type="password" class="form-control" name="password" id="InputPass" placeholder="Insira sua senha..">
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Atualizar</button>
            </div>
    </form><br>
@endsection