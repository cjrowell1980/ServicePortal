<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('profile.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateProfileRequest $request): RedirectResponse
    {
        $input = $request->all();

        if($request->hasFile('avatar')) {
            $avatarName = time() .'.'.$request->avatar->getClientoriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $input['avatar'] = $avatarName;
        } else {
            unset($input['avatar']);
        }

        if($request->filled('password')) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        auth()->user()->update($input);

        return redirect()->route('profile.index')
            ->withSuccess('Details have been updated successfully.');
    }
}
