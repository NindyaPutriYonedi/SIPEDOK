<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $users = User::when($keyword,function($query) use ($keyword){
            $query->where('username','like',"%$keyword%");
        })
        ->paginate(10);

        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create([
    'username'=>$request->username,
    'password'=>md5($request->password),
    'role'=>$request->role,
    'access_level'=>$request->access_level
]);

        return redirect('/users')
        ->with('success','Data berhasil ditambah');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $data = [
            'username'=>$request->username,
            'role'=>$request->role,
            'access_level'=>$request->access_level
        ];

        if($request->password)
        {
            $data['password'] =
md5($request->password);
        }

        $user->update($data);

        return redirect('/users')
        ->with('success','Data berhasil diubah');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/users')
        ->with('success','Data berhasil dihapus');
    }
}
