@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  body {
      background-color: #f7e488;
  }
  table, tr, td {
      background-color: white;
  }
  a:hover {
  background-color: gold;
}
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  Cliquez <a href="{{ route('home')}}">ici</a> pour revenir au menu.
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Auteur</td>
          <td>Titre</td>
          <td>Description</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($playlistcases as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->auteur}}</td>
            <td>{{$case->titre}}</td>
            <td>{{$case->description}}</td>
            <td><a href="{{ route('playlists.edit', $case->id)}}" class="btn btn-primary">Modifier</a></td>
            <td>
                <form action="{{ route('playlists.destroy', $case->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection