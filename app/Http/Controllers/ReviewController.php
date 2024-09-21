<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
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
            $datas = Review::all();
            return view('admins.review', ['datas' => $datas]);
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
            'isi' => 'required',

        ]);

        $data = new Review();
        $data->isi = $request->isi;
        $data->user_id = $request->user_id;
        $data->buku_id = $request->buku_id;
        $data->save();

        return redirect("/showbuku/$data->buku_id");
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
        $data = Review::findOrFail($id);
        return view('members.editreview', ['data' => $data]);
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
            'isi' => 'required',

        ]);

        $data = Review::findOrFail($id);
        $data->isi = $request->isi;
        $data->save();

        return redirect("/showbuku/$data->buku_id");
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
        
        
    }

    public function bukus(){
        return $this->belongsTo(Buku::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id){
        if(Auth::user()->role_id === 1){
            $data = Review::findOrFail($id);
        
            $data->delete();

            $dataa = Review::onlyTrashed()->where('id',$id);
            $dataa->forceDelete();

            return redirect('/reviews');
        }

        $data = Review::find($id);
        
        $data->delete();

        $dataa = Review::onlyTrashed()->where('id',$id);
        $dataa->forceDelete();

        return redirect("/showbuku/$data->buku_id");
    }
}
