<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('permission:blogs.index | crear-blog | editar-blog | eliminar-blog')->only('index');
        // $this->middleware('permission:crear-blog')->only('create', 'store');
        // $this->middleware('permission:editar-blog', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->id());
        if($user->hasRole('admin')){
            $blogs = Blog::select('blogs.*', 'users.name')
            ->join('users', 'blogs.user_id', '=', 'users.id')->paginate(5);
        }else{
            $blogs = Blog::select('blogs.*', 'users.name')
            ->join('users', 'blogs.user_id', '=', 'users.id')->where('blogs.user_id','=',auth()->id())->paginate(5);
        }
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$permissions = Permission::get();
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, ['title' => 'required|string|min:3', 'content' => 'required|string|min:3', 'user_id' => 'required|min:1']);
      
        $blog = Blog::create([
            'title' => $validate['title'],
            'content' => $validate['content'],
            'user_id' => intVal($validate['user_id'])
        ]);

        return redirect()->route('blog.index');
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
        $blog = Blog::find($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
       $validate = $this->validate($request, ['title' => 'required|string|min:3', 'content' => 'required|string|min:3', 'user_id' => 'required|min:1']);
      $blog = Blog::find($blog->id);
        $blog->update([
            'title' => $validate['title'],
            'content' => $validate['content'],
            'user_id' => intVal($validate['user_id'])
        ]);

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
