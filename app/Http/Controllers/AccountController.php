<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{

    /**
     * Display my account page
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('page.account');
    }

    /**
     * Login user in to the system
     *
     * @param Request $request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    /**
     * Logout user from the system
     *
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Register user in the system
     *
     * @param Request $request
     */
    public function register(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // 'subscribed' is not required and will default to '0' if not present
        ])->validate();
    
        // Check if 'subscribed' is set and true, if not, default to false ('0')
        $subscribed = $request->has('subscribed') ? 1 : 0;
    
        $user = User::create([
            'firstname' => $validatedData['firstName'],
            'lastname' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'subscribed' => $subscribed, // Use the $subscribed variable here
        ]);
    
        Auth::login($user);
    
        return redirect()->route('success')->with('success', 'Registration successful.');
    }

    /**
     * Display a success message for logged-in users
     *
     */
    public function success()
    {
        // implement check if the user is authorized
        if (true) {
            return view('page.success')->with(['firstname' => 'John', 'lastname' => 'Smith']);
        }

        return redirect('/');
    }
}
