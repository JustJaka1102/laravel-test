<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('dashboard.content.users_list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        
        $request->validated();
        $fileName = null;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('user/', $fileName);
        }
        User::create([
            'email' => $request->email,
            'user_name' => $request-> user_name,
            'birthday' => $request->birthday,
            'first_name' => $request-> first_name,
            'last_name'=> $request->last_name,
            'password' => bcrypt($request->password), 
            'avatar' => $fileName,
        ]);
        //redirect
        return redirect()->route('dashboard.users')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.content.user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();
        if ($user->avatar) {
            Storage::delete('user/' . $user->avatar);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('user/', $fileName); 
        }
        $user->update([
                'email' => $request->email,
                'user_name' => $request-> user_name,
                'birthday' => $request->birthday,
                'first_name' => $request-> first_name,
                'last_name'=> $request->last_name,
                'avatar' => $fileName,
            ]);
        return redirect()->route('dashboard.users')
            ->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.users')
            ->with('success', 'Product deleted successfully');
    }
}
