@extends('layouts.layout')

@section('title', 'Perfil')

@section('stylesheets')
  <link href="{{ asset('/css/styleHome.css') }}" rel="stylesheet"/>
@endsection

@section('content')
<div class="container">
    <form method="post" action="{{ route('perfilUpdate') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp" placeholder="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="InputName">Nome</label>
                        <input type="text" name="name" class="form-control" id="InputName" placeholder="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="InputPass">Senha</label>
                        <input type="password" class="form-control" name="password" id="InputPass" placeholder="Insira sua senha..">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex d-inline row">
                        <div class="col-md-6">
                            <h5>Endereço de entrega</h5> 
                        </div>
                        <div class="col-md-6">
                            @if($user->cep !== null)
                                <a href="{{ route('deleteAddressSave') }}" class="btn btn-danger btn-sm float-right">Excluir endereco</a>
                            @endif
                        </div>
                    </div>
                    <div class="mt-3">
                        @if ($user->cep !== null && $user->endereco !== null && $user->bairro !== null)
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Rua</th>
                                        <td class="text-right">{{$user->endereco}}, n° {{$user->numero}}.
                                            {{$user->bairro}}</td>
                                    </tr>
                                    <tr class="">
                                        <th>Cidade ({{$user->cep}})</th>
                                        <td class="text-right">{{$user->cidade}} - {{$user->estado}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            Nenhum endereço salvo no momento...
                        @endif
                    </div>
                </div>
            </div>
        <button class="btn btn-success" type="submit">Atualizar</button>
    </form>
    <form action="{{ route('deletarConta') }}" method="post">
        @csrf
        <button class="btn btn-danger btn-sm float-right" type="submit">Deletar conta</button>
    </form>
</div>
<div style="height:130px"></div>
@endsection