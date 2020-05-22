@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  body {
        background-color: #24d863;
    }
</style>
<div class="card uper">
  <div class="card-header">
   <b> Ajouter une musique à votre playlist </b>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('playlists.store') }}">
          <div class="form-group">
              @csrf
              <label for="auteur">Auteur :</label>
              <input type="text" class="form-control" name="auteur"/>
          </div>
          <div class="form-group">
              <label for="titre">Titre :</label>
              <input type="text" class="form-control" name="titre"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
      <a href="{{ route('home')}}">Retourner au menu</a>
  </div>
</div>
@endsection