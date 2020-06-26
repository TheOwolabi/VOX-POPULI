<?php

namespace App\Http\Controllers;

use App\Models\Metier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Metier::create([
            'title' => $request->title,
            'description' => $request->descr,
            'user_id' => Auth::id()
        ]);

        auth()->user()->setMetierId($metier);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function show(Metier $metier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function edit(Metier $metier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metier $metier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Metier  $metier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metier $metier)
    {
        //
    }
}
