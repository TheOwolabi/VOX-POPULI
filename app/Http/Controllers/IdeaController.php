<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Image;
use App\User;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\IdeaFormRequest;
use App\Models\Commentable;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $bg = '../../images/login.jpg';

    public function index()
    {
        $actualites = Actualite::all()->reverse();

        return view('actualite.all',compact(['bg','actualites']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //    return view('idea.create',compact(['bg',idea']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdeaFormRequest  $request)
    {    
   
        $idea = Idea::create([
            'topic' => $request->topic,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'categorie_id' => $request->categorie,
            'user_id' => auth()->user()->id,
           
        ]);

        if($request->cover)
        {

            $path = $request->file('cover')->store('uploads','public');

            $image = Image::create([
                'path' => $path,
                'user_id' => auth()->user()->id,  
            ]);
            
            $image->attributeToIdea($idea);

            
            $idea->update([
                'image_id' => $image->id
            ]);
        }
    
      

       $idea->categorise($request->categorie);
        notify()->success("Bravo ! Idée soumise à l'approbation de la communauté ...");
        return redirect()->route(['bg','index']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {
        $comments = Commentable::where('commentable_id',$idea->id)->get()->reverse();
        //  $comments = [];
        
        $bg = $this->bg;
      
        return view('idea.show',compact(['bg','idea','comments']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        $bg = $this->bg;
        $categories = Categorie::all();
        return view('idea.edit',compact(['bg','idea','categories','bg']));
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
        $bg = $this->bg;

        $idea->update([
            'topic' => $request->topic,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'categorie_id' => $request->categorie,
            'user_id' => auth()->user()->id,
        ]);

        if($request->cover)
        {
            $path = $request->file('cover')->store('uploads','public');

            
            $image = Image::create([
                'path' => $path,
                'user_id' => auth()->user()->id,  
            ]);
            
            $image->attributeToIdea($idea);

            $idea->update([
                'image_id' => $image->id
            ]);

        }
    

       $idea->categorise($request->categorie);

        notify()->success("Bravo ! Idée soumise à l'approbation de la communauté ...");

        return redirect()->route(['bg','index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idea  $idea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        $bg = $this->bg;
        $idea->delete();

        notify()->success("Idée supprimée avec succèss");

        return redirect()->route(['bg','index']);
    }
}
