@extends('layouts.layout')

@section('title', 'Doomus FAQ')

@section('stylesheets')
  <style>
    li
    {
      margin-top: 18px;
      margin-bottom: 18px;
    }
    #faq
    {
      font-size: 1.3em;
    }
    #faq a
    {
      color: blue;
    }
  </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
          <div class="card text-center w-100 col-12 mx-auto mt-4">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" id="faqLink">Perguntas Frequentes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="howToUseLink">Como usar o site</a>
                </li>
              </ul>
            </div>
            <div class="card-body" id="faq">
              <p class="card-text">
                <ul style="list-style:none;" class="text-left">
                  <div class="border-top"></div>
                    <li>
                        <a data-toggle="collapse" href="#resp1" role="button" aria-expanded="false" aria-controls="resp1">Como faço pra rastrear meu pedido?</a>
                        <div class="collapse" id="resp1">
                          <div class="">
                            No momento essa funcionalidade está indisponível
                          </div>
                        </div>
                    </li>
                    <div class="border-top"></div>
                    <li>
                        <a data-toggle="collapse" href="#resp2" role="button" aria-expanded="false" aria-controls="resp2">Como faço para apagar minha conta?</a>
                        <div class="collapse" id="resp2">
                          <div class="">
                            Acesse Meu Perfil > Deletar conta.
                          </div>
                        </div>
                    </li>
                    <div class="border-top"></div>
                    <li>
                        <a data-toggle="collapse" href="#resp3" role="button" aria-expanded="false" aria-controls="resp3">É possível pagar usando boleto?</a>
                        <div class="collapse" id="resp3">
                          <div class="">
                            No momento essa funcionalidade está indisponível
                          </div>
                        </div>
                    </li>
                    <div class="border-top"></div>
                    <li>
                        <a data-toggle="collapse" href="#resp4" role="button" aria-expanded="false" aria-controls="resp4">Possui loja física?</a>
                        <div class="collapse" id="resp4">
                          <div class="">
                            Não possuímos loja física.
                          </div>
                        </div>
                    </li>
                    <div class="border-top"></div>
                    <li>
                        <a data-toggle="collapse" href="#resp5" role="button" aria-expanded="false" aria-controls="resp5">Posso devolver um produto?</a>
                        <div class="collapse" id="resp5">
                          <div class="">
                            Sim. O PayPal pode reembolsar você caso opte pela devolução.
                          </div>
                        </div>
                    </li>
                    <div class="border-top"></div>
                    <li>
                        <a data-toggle="collapse" href="#resp6" role="button" aria-expanded="false" aria-controls="resp6">Como faço para falar com o suporte?</a>
                        <div class="collapse" id="resp6">
                          <div class="">
                            Clicando na aba inferior direita da página. "Suporte".
                          </div>
                        </div>
                    </li>
                    <div class="border-top"></div>
                </ul>
              </p>
            </div>
            <div class="card-body d-none" id="howToUse">
              <p class="card-text">
                  <div id="carouselExampleIndicators" class="banner-carousel-main-slide carousel slide h-100" data-ride="carousel">
                      <ol class="carousel-indicators" style="z-index: 3;">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      </ol>
                      <div class="banner-carousel-inner carousel-inner h-50" style="border-radius: 0px;">
                        <div class="carousel-item active">
                          <h2 class="mb-2">Como se registrar</h2>
                          <img src="{{asset('/img/docs/registro.png')}}" style="width:100%;height:auto;" class="d-block" alt="Como se registrar">
                        </div>
                        <div class="carousel-item">
                            <h2 class="mb-2">Como enviar uma mensagem para o suporte</h2>
                          <img src="{{asset('/img/docs/ticket.png')}}" style="width:100%;height:auto;" class="d-block" alt="Como se registrar">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
              </p>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/js/customJs/docs.js') }}"></script>
@endsection