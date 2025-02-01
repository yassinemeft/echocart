<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        try {
            // Skip deleting the profile image when deleting the account
            // if ($user->profile_image) {
            //     Storage::disk('public')->delete($user->profile_image);
            // }

            // Supprimer l'utilisateur de la base de données
            User::destroy($user->id);

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Your account has been deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting account: ' . $e->getMessage());
            return redirect()->route('profile.show')->with('error', 'An error occurred while deleting your account.');
        }
    }
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir votre profil.');
        }

        return view('profile', compact('user'));
    }
}
?>
