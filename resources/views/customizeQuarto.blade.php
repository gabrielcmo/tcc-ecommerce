@extends('layouts.layout')

@section('title', 'Doomus - Customize')

@section('stylesheets')
    <style>
        #areaCobertor{
            background-color: red;
        }

        #areaTravesseiro{
            background-color: red;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12" style="background-color:#D7CEC7">
                <h5 class="mt-3 text-center">Clique nos itens da imagem para ser redirecionado ao produto</h5>
                <h5 class="mt-3">Itens:</h5>
                <ul>
                    <li>Quadro</li>
                    <li>Travesseiro</li>
                    <li>Cobertor</li>
                </ul>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="mx-auto">
                    <img src="{{asset('/img/quarto.jpg')}}" alt="Quarto" width="100%" usemap="#quartoItens">
                </div>
                <map name="quartoItens">
                    <area id="areaCobertor" shape="poly" coords="360, 265, 560, 270, 490, 400, 210, 290" href="/produto/10" alt="Cobertor">
                    <area id="areaQuadro" shape="rect" coords="85, 35, 120, 88" href="/produto/11" alt="Quadro">
                    <area id="areaTravesseiro" shape="rect" coords="385, 210, 570, 260" href="/produto/3" alt="Travesseiro">
                </map>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection