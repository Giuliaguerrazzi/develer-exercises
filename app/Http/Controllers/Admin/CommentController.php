<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //andiamo a prendere i comment solo dell'utente registrato
        //prendi dai post tutti quelli con l'id dell'user id
        $comments = Comment::where('user_id', Auth::id())
                    //ordina i commenti in ordine discendente
                    ->orderBy('created_at', 'desc')
                    ->get(); //ritorna tutti i record

        return view ('admin.comments.index', compact('comments'));            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comments.create');
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

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $data['user_id'] = Auth::id(); //serve l'id dell'utente loggato

        $data['slug'] = Str::slug($data['title'], '-');

        $newcomment = new Comment();
        $newcomment->fill($data); //fillable del modello

        $saved = $newcomment->save();

        //controllo salvataggio
        if($saved) {
            return redirect()->route('admin.comments.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comments)
    {
        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comments)
    {
        return view('admin.comments.edit', compact('comments'));
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
        $data = $request->all();

        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
       
        $data['user_id'] = Auth::id();

        $data['slug'] = Str::slug($data['title'], '-');
        
        $updated = $comments->update($data);

        if ($updated){

            return redirect()->route('posts.show', $comments->slug);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::find($id);

        $deleted = $comments->delete();

        if($deleted) {
            return redirect()->route('admin.comments.index');
        }
    }
}
