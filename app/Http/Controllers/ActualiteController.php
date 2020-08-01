<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Actualite;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\ActualiteFormRequest;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $actualites = Actualite::all()->reverse();

       return view('actualite.all',compact('actualites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actualite = new Actualite;
        $categories = Categorie::all();
        return view('actualite.create',compact(['actualite','categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActualiteFormRequest $request)
    {
        
        if($request->hasFile('cover'))
        {
            $path = $request->file('cover')->store('uploads','public');

            $image = Image::create([
             'path' => $path,
             'user_id' => auth()->user()->id
            ]);

            Actualite::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => auth()->user()->id,
                'categorie_id' => $request->categorie,

                'image_id' => $image->id,
            ]);
        }
        else
        {

            Actualite::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => auth()->user()->id,
                'categorie_id' => $request->categorie,
            ]);  
        }

        notify()->success("Nouvelle actualité maintenant en ligne");
        return redirect()->route('actualite.index');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function show(Actualite $actualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function edit(Actualite $actualite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function update(ActualiteFormRequest $request, Actualite $actualite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actualite  $actualite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actualite $actualite)
    {
        //
    }
}
