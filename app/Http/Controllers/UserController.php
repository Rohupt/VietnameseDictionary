<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.index', compact($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validator($request->all())->validate();

        User::find($user->id)->update([
            'name' => $request->name,
            'fullname' => $request->fullname,
            'gender' => $request->gender == 'null' ? null : ($request->gender == 'true' ? 1 : 0),
            'date_of_birth' => $request->date_of_birth
        ]);
        return redirect(route('user.show', ['user' => $user]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function toggleEntry(Request $request) {
        if (DB::table('user_entries')->where('entry', $request->entryId)->where('id', Auth::id())->exists()) {
            DB::table('user_entries')->where('entry', $request->entryId)->where('id', Auth::id())->delete();
            return response()->json(['action' => 'deleted']);
        } else {
            DB::table('user_entries')->insert(['entry' => $request->entryId, 'id' => Auth::id()]);
            return response()->json(['action' => 'inserted']);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['string', 'max:255'],
            'name' => ['required', 'string', 'max:255', Rule::unique('users', 'name')->ignore(Auth::user()->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
        ]);
    }
}
