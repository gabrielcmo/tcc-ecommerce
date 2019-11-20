@extends('layouts.layout')

@section('title', 'Atualizar avaliação')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
      <div class="card mt-2">
        <div class="card-header">
          Atualizar avaliação do produto: {{$rating->product->name}}
        </div>
        <div class="card-body">
          <form action="{{route('rating.update')}}" method="post">
            @csrf

            <input type="hidden" name="rating-id" value="{{$rating->id}}">
  
            <div class="form-group">

              <label for="new-title">Novo título</label>
              <input type="text" name="title_rating" id="new-title" class="form-control" placeholder="{{$rating->title}}">
              @if ($errors->has('title_rating'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title_rating') }}</strong>
                </span>
              @endif
            </div>
  
            <div class="form-group">
              <label for="new-text">Nova descrição</label>
              <textarea name="description_text" id="new-text" class="form-control" rows="5" placeholder="{{$rating->text}}"></textarea>
              @if ($errors->has('description_text'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description_text') }}</strong>
                </span>
              @endif
            </div>
  
            <div class="form-group">
              <label for="new-star-note">Nova nota</label>
              <div id="new-star-note" class="d-flex">
                <i class="material-icons stars-rating star-1" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-2" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-3" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-4" style="font-size: 2.5rem">star</i>
                <i class="material-icons stars-rating star-5" style="font-size: 2.5rem">star</i>
              </div>
              <input type="hidden" name="note_rating" id="new-note">
              @if ($errors->has('note_rating'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('note_rating') }}</strong>
                </span>
              @endif
            </div>
            <button class="mdc-button mdc-button--raised general-button" type="submit">
              <span class="mdc-button__label">Atualizar</span>
            </button>
          </div>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/customJs/ratingEdit.js')}}"></script>
@endsection