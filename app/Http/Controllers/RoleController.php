<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk ke tampilan admin role
        $user = Role::all();
        return view('pages.admin.role', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk ke tampilan admin role tambah
        return view('pages.admin.role.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk membuat data di table user
        $validator = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);
        $hash_password = Hash::make('password');
        $validator['password'] = $hash_password;
        Role::create($validator);

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //untuk ke tampilan admin user edit
        $user = Role::findOrFail($id);
        return view('pages.admin.role.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //untuk mengupdate data id user
        $user = Role::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',

            'role' => 'required|string',
        ]);

        $user->update($validator);
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //untuk menghapus data user
        Role::where('id', $id)->delete();
        return redirect('admin/user');
    }
}
