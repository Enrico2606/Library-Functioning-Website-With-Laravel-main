<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role_id === 1){
            $datas = Buku::paginate(10);
            return view('admins.buku', ['datas' => $datas]);
        }
        return abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->role_id === 1){
            $category = Category::all();
        return view('admins.createbuku', ['cates' => $category]);
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'judul' => 'required|max:50',
            'author' => 'required|max:50',
            'isi' => 'required',
            'category_id' => 'required',
        
        ]);

        if($request->file('foto')){
            $name = $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->store('public/image');
            $request->file('foto')->move(public_path('images'), $name);
        }else{
            $path = null;
        }

        $data = new Buku();
        $data->judul = $request->judul;
        $data->author = $request->author;
        $data->isi = $request->isi;
        $data->category_id = $request->category_id;
        $data->foto = $name;
        $data->save();
        return redirect('/bukus');
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
        //
        if(Auth::user()->role_id === 1){
            $data = Buku::findOrFail($id);
            $category = Category::all();
            return view('admins.editbuku', ['data' => $data, 'cates' => $category]);
        }
        return abort(404);
        
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
        $this->validate($request, [
            'judul' => 'required|max:50',
            'author' => 'required|max:50',
            'isi' => 'required',
            'category_id' => 'required',
        
        ]);

        if($request->file('foto')){
            $name = $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->store('public/image');
            $request->file('foto')->move(public_path('images'), $name);
        }else{
            $path = null;
        }

        $data = Buku::findOrFail($id);
        $data->judul = $request->judul;
        $data->author = $request->author;
        $data->isi = $request->isi;
        $data->category_id = $request->category_id;
        $data->foto = $name;
        $data->save();
        return redirect('/bukus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Buku::find($id);
        $data->delete();
        return redirect('/bukus');
    }
    
}
