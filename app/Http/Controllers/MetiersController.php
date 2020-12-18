<?php

namespace App\Http\Controllers;


use App\Models\Metier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MetierFormRequest;

class MetiersController extends Controller
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
        $metiers = Metier::where('user_id', Auth::id())->get()->reverse();

        return view('metier.all', compact('metiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metier = new Metier;

        return view('metier.create', compact('metier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MetierFormRequest $request)
    {

        $metier = Metier::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        auth()->user()->setMetierId($metier);

        return redirect()->route('metier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function show(Metier $metier)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function edit(Metier $metier)
    {
        return view('metier.edit', compact('metier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function update(MetierFormRequest $request, Metier $metier)
    {
        $metier->update($request->all());

        return redirect()->route('metier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metier $metier)
    {
        Metier::destroy($metier->id);

        return redirect()->route('metier.index');
    }
}
