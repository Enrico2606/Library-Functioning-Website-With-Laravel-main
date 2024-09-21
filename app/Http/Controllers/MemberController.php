<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
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
            $datas = User::all();
            $blocks = User::onlyTrashed()->get();
            return view('admins.member', ['datas' => $datas, 'blocks' => $blocks]);
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
        $user = User::findOrFail($id);
        $rev = Review::all();

        return view('admins.showmember', ['user' => $user, 'review' => $rev]);
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

    public function hapus($id)
    {
        if(Auth::user()->role_id === 1){
            $data = User::find($id);
            $data->delete();

            $rev = Review::where('user_id' , $id);
            $rev->delete();

            return redirect('/members');
        }
        return abort(404);

        
    }

    public function unblock($id)
    {
        if(Auth::user()->role_id === 1){
            $data = User::onlyTrashed()->where('id',$id);
            $data->restore();

            $rev = Review::onlyTrashed()->where('user_id',$id);
            $rev->restore();

            return redirect('/members');
        }
        return abort(404);
        
    }

    public function profile($id){

        $user = User::findOrFail($id);
        $rev = Review::all();

        return view('members.profile', ['user' => $user, 'review' => $rev]);

    }
}
