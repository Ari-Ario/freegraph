<?php

// app/Http/Controllers/Auth/CustomRegisteredUserController.php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use freegram\Fortify\Http\Controllers\Controller;

class CustomRegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return parent::store($request->merge([
            'name' => $request->input('firstName') . ' ' . $request->input('lastName'),
        ]));
    }
}
