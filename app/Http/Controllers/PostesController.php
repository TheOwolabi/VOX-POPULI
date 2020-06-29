<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Poste;
use App\Http\Requests\PosteFormRequest;

class PostesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postes = Poste::all();
        return view('poste.all',compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poste = new Poste;
        return view('poste.create',compact('poste'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PosteFormRequest $request)
    {
        Poste::create([
            'intitule' => $request->intitule,
            'fiche' => $request->fiche,
            'mandat' => $request->mandat,
        ]);

        return redirect()->route('poste.index');
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
    public function edit(Poste $poste)
    {
        return view('poste.edit',compact('poste'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PosteFormRequest $request, Poste $poste)
    {
        $poste->update($request->all());

        return redirect()->route('poste.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poste::destroy($id);

        return redirect()->route('poste.index'); 
    }
}
