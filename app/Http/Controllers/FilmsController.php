<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use App\Genre;
use App\Pivote;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::paginate(1);;
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }
        $genres = Genre::pluck("name","id")->all();
        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if(!empty($data['id'])){
            $film = Film::find($data['id']);
        }else{
            $film = new Film($data);
        }
        $filename = '';
        if($request->file('photo')){

            $file = $request->file('photo');
            //$file->storeAs('photos',$file->getClientOriginalName());
            \Storage::disk('public')->put('photos', $file);
            $filename = 'photos/'.$file->getClientOriginalName();
        }

        $data['photo'] = $filename;

        if($film->save()) {
            $pivoteD = Pivote::where('film_id',$film->id);
            $pivoteD->delete();
            foreach ($data['genre_id'] as $genre_id){
                $pivote = new Pivote([
                    'genre_id' => $genre_id,
                    'film_id' => $film->id,
                ]);
                $pivote->save();
            }

            return redirect('/films')->with('success', 'Film has been added');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //$films = Film::find($id);
        $films = Film::whereSlug($slug)->with('comments')->first();
        $pivotesGenres = \DB::table('genres')
            ->join('pivotes', 'genres.id', '=', 'pivotes.genre_id')
            ->select( 'genres.id','genres.name')
            ->where('pivotes.film_id', $films->id)
            ->get()->toArray();


        return view('films.show', compact('films','pivotesGenres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }
        $films = Film::find($id);
        $pivotesGenres = \DB::table('genres')
        ->join('pivotes', 'genres.id', '=', 'pivotes.genre_id')
        ->select( 'genres.id')
        ->where('pivotes.film_id', $id)
        ->get()->toArray();
        $selectedGenres = [];
        foreach($pivotesGenres as $key=>$pivotesGenre ){
            $selectedGenres[] = $pivotesGenre->id;
        }
        $genres = Genre::pluck("name","id")->all();

        return view('films.edit', compact('genres','films','selectedGenres'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!\Auth::check()) {
            return redirect('/login');
        }
        $pivoteD = Pivote::where('film_id',$id);
        $pivoteD->delete();
        $films = Film::delete($id);
    }
}
