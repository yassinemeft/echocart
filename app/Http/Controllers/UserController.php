<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Afficher le profil de l'utilisateur.
     */
    public function show()
    {
        return view('profile', [
            'user' => Auth::user() // Récupérer l'utilisateur connecté
        ]);
    }

    /**
     * Mettre à jour les informations de l'utilisateur.
     */

    /**
     * Supprimer le compte utilisateur (sans supprimer l'image de profil).
     */
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        try {
            Auth::logout();
            User::destroy($user->id);

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur suppression compte : ' . $e->getMessage());
            return redirect()->route('profile.show')->with('error', 'Une erreur est survenue lors de la suppression du compte.');
        }
    }
}
?>