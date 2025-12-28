<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Afficher le formulaire d'inscription
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Gérer l'inscription d'un nouvel utilisateur
     */
    public function register(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:buyer,seller', // Seuls ces rôles sont acceptés
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Connexion automatique après inscription
        Auth::loginUsingId($user->id);

        // Redirection vers le tableau de bord
        return redirect()->route('home')->with('success', 'Inscription réussie !');
    }

    /**
     * Afficher le formulaire de connexion
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Gérer la connexion d'un utilisateur
     */
    public function login(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Vérification des informations d'identification
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirection vers le tableau de bord après connexion réussie
            return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
        }

        // Si la connexion échoue, message d'erreur
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }

    /**
     * Gérer la déconnexion de l'utilisateur
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'Déconnexion réussie.');
    }
    protected function redirectTo()
    {
        return route('dashboard');
    }
}
