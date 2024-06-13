<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function edit($id)
    {
    }
    public function update($id, Request $request)
    {
    }
    public function destroy($id)
    {
        $User = User::find($id);
        if (!$User) {
            return redirect()->back()->with(['Eror', 'Pengguna tidak dapat digunakan'],);
        }

        $User->delete();
        return redirect()->route('user.index')->with(['Berhasil', 'Data berhasil dihapus']);
    }
}
