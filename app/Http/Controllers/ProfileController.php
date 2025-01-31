<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile', [
            'user' => Auth::user() // Récupérer directement l'utilisateur connecté
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        try {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->update(['profile_image' => $path]); // Mise à jour simplifiée

            return redirect()->route('profile.show')->with('success', 'Profile image updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating profile image: ' . $e->getMessage());
            return redirect()->route('profile.show')->with('error', 'An error occurred while updating your profile image.');
        }
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        try {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            Auth::logout();
            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Your account has been deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting account: ' . $e->getMessage());
            return redirect()->route('profile.show')->with('error', 'An error occurred while deleting your account.');
        }
    }
}
?>
