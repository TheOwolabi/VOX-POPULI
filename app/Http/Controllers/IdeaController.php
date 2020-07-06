<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaFormRequest;

class IdeaController extends Controller
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
        $idea = new Idea;
       return view('idea.create',compact('idea'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdeaFormRequest $request)
    {
        Idea::create([
            'topic' => $request->topic,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'user_id' => auth()->user()->id

        ]);

        notify()->success("Bravo ! Idée soumise à l'approbation de la communauté ...");
        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        return view('idea.edit',compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function update(IdeaFormRequest $request, Idea $idea)
    {
        $idea->update($request->all());

        notify()->success("Bravo ! Idée soumise à l'approbation de la communauté ...");

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        notify()->success("Idée supprimée avec succèss");

        return redirect()->route('index');
    }
}
