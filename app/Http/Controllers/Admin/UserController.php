<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserDestroyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //
        $user = new User;
        $user->fill($request->except('password'));
        $user->password = Hash::make($request->input('password'));
        $user->admin = 1;
        $user->save();
        $request->session()->flash('notify', 'Create success!');
        return redirect()->route('user.index');
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
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $user->fill($request->except('password'));
        if ($request->input('password') != '')
            $user->password = Hash::make($request->input('password'));
        $user->save();
        $request->session()->flash('notify', 'Update Success!');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyRequest $request, $id)
    {
        //
        $deleted = User::destroy($request->input('ids'));
        if ($deleted == count($request->input('ids')))
            session()->flash('notify', 'Delete success!');
        else
            session()->flash('error', 'Some items can not be deleted!');
        return back();
    }
}
