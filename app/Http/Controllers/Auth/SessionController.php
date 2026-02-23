<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('landing.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $login = $validated['usuario'];
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (! Auth::attempt([$field => $login, 'password' => $validated['password']])) {
            throw ValidationException::withMessages([
                'usuario' => 'Las credenciales ingresadas no son válidas.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('campus.redirect');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('iniciodeseccion');
    }
}
