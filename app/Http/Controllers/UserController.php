<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index', [
            "users" => User::latest()->filter()->withSum('invoices', 'cost')->get()
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('users.edit', [
            "user" => User::find($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        User::find($id)->update(\request()->only(['name', 'email', 'phone']));
        return redirect("/users/$id/edit");
    }


    public function destroy($id)
    {
        //
    }
}
