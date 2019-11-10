@extends('layouts.layout')

@section('title', 'Doomus FAQ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-3 mt-2 mb-5">
                <h2>Dúvidas frequentes</h2>
            </div>
            <div class="col-md-6">
                <ul>
                    <li>
                        <a data-toggle="collapse" href="#resp1" role="button" aria-expanded="false" aria-controls="resp1">Como faço pra rastrear meu pedido?</a>
                        <div class="collapse" id="resp1">
                          <div class="">
                            No momento essa funcionalidade está indisponível
                          </div>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#resp2" role="button" aria-expanded="false" aria-controls="resp2">Como faço para apagar minha conta?</a>
                        <div class="collapse" id="resp2">
                          <div class="">
                            Acesse Meu Perfil > Deletar conta.
                          </div>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#resp3" role="button" aria-expanded="false" aria-controls="resp3">É possível pagar usando boleto?</a>
                        <div class="collapse" id="resp3">
                          <div class="">
                            No momento essa funcionalidade está indisponível
                          </div>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#resp4" role="button" aria-expanded="false" aria-controls="resp4">Possui loja física?</a>
                        <div class="collapse" id="resp4">
                          <div class="">
                            Não possuímos loja física.
                          </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                    <li>
                        <a data-toggle="collapse" href="#resp5" role="button" aria-expanded="false" aria-controls="resp5">Posso devolver um produto?</a>
                        <div class="collapse" id="resp5">
                          <div class="">
                            Sim. O PayPal pode reembolsar você caso opte pela devolução.
                          </div>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#resp6" role="button" aria-expanded="false" aria-controls="resp6">Como faço para falar com o suporte?</a>
                        <div class="collapse" id="resp6">
                          <div class="">
                            Clicando na aba inferior direita da página. "Suporte".
                          </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div style="height:126px"></div>
@endsection