<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all()->sortByDesc('updated_at');
        $posts = Post::orderBy('updated_at','desc')->paginate('15');
        //->sortDesc()
        // dd($posts);
        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the published resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPublished()
    {
        $publishedPosts = Post::where('published', 1)->get()->sortByDesc('updated_at');
        return view('posts.published', compact('publishedPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        $now = Carbon::now()->format('Y-m-d-H-m-s');
        $data['slug'] = Str::slug($data['title'], '-') . $now;
        // dd($data);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:50',
            'body' => 'required|string',
            'published' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $post = new Post;
        $post->fill($data);
        $saved = $post->save();
        if (!$saved) {
            dd('ERRORE DI SALVATAGGIO DATI');
        }

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $post = Post::find($id);
        $post = Post::where('slug', $slug)->first();
        // dd($post);
        if (empty($post)) {
            abort('404');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (empty($post)) {
            abort('404');
        }

        return view('posts.edit', compact('post'));
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
        $post = Post::find($id);

        if (empty($post)) {
            abort('404');
        }

        $data = $request->all();
        $now = Carbon::now()->format('Y-m-d-H-m-s');
        $data['slug'] = Str::slug($data['title'], '-') . $now;
        // dd($data);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:50',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $post->fill($data);
        $updated = $post->update();
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        // if (!$updated) {
        //     return redirect()->back()->with('status', 'Photo non aggiornata');
        // } CONTROLLARE INSERIMENTO IN VIEW PRINCIPALE CON @ERROR
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
