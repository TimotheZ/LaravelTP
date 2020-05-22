<?php
// on créer ce controller avec la commande php artisan controller et on met le flag -r pour avoir des fonctions prédefinis
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlistcases = Playlist::all();

        return view('index',  compact('playlistcases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([       // ici on a mis des regles pour la validation du formulaire, on demande la totalité des champs remplis
            'auteur' => 'required',
            'titre' => 'required',
            'description' => 'required',
        ]);
        $show = Playlist::create($validatedData);
   
        return redirect('/playlists')->with('success', 'Votre musique a été ajouté à votre playlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlistcase = Playlist::findOrFail($id);

        return view('edit', compact('playlistcase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'auteur' => 'required',
            'titre' => 'required',
            'description' => 'required',
        ]);
        Playlist::whereId($id)->update($validatedData);

        return redirect('/playlists')->with('success', 'Votre musique a été mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlistcase = Playlist::findOrFail($id);
        $playlistcase->delete();

        return redirect('/playlists')->with('success', 'Votre musique a été supprimer !');
    }
}
