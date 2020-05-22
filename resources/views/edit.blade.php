@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  body {
      background-color : #f77676;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <b>Modifier votre musique</b>
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
      <form method="post" action="{{ route('playlists.update', $playlistcase->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="auteur">Auteur :</label>
              <input type="text" class="form-control" name="auteur" value="{{ $playlistcase->auteur }}"/>
          </div>
          <div class="form-group">
              <label for="titre">Titre :</label>
              <input type="text" class="form-control" name="titre" value="{{ $playlistcase->titre }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" name="description" value="{{ $playlistcase->description }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
      <a href="{{ route('home')}}">Retourner au menu</a>

  </div>
</div>
@endsection