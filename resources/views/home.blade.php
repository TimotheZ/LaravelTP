@extends('layouts.app')
@section('content')
<style>
    .middle {
        margin-left:33em;
        margin-top: 5%;
    }
    body {
        background-color: #4bd8cd;
    }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Authentification</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenue {{auth()->user()->name}} sur notre site !
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row middle">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Playlist</h5>
          <p class="card-text">La playlist du moment, où les utilisateurs de notre site, mettent leurs musiques
              favorites du moment. Vous pouvez retrouver tous styles de musiques, du Jul, etc. Venez donc voir !
          </p>
          <a href="{{ route('playlists.index')}}" class="btn btn-primary">Voir la playlist</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ajouter une musique</h5>
          <p class="card-text">Mettez vos musiques du moment dans la playlist dédié pour vous.
            Ajouter tous les styles de musiques pour créer une playlist originale ! Ou créer des playlists types comme summer etc !</p>
          <a href="{{ route('playlists.create')}}" class="btn btn-primary">Ajouter une musique</a>
        </div>
      </div>
    </div>
  </div>
@endsection
