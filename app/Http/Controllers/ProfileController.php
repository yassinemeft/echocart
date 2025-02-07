<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


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

    public function update(Request $request)
{

    $user = auth()->user();



    $request->validate([
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('profile_image')) {
        // Upload the image to Cloudinary
        $image = $request->file('profile_image');
        $uploadedImage = Cloudinary::upload($image->getRealPath(), [
            'folder' => 'profile_images',
        ]);

        // Get the URL of the uploaded image
        $imageUrl = $uploadedImage->getSecurePath();

        // Save the image URL to the user's profile in the database
        // Update the user's profile image URL in the database
        $user->profile_image = $imageUrl;
        $user->save();
    }

    return redirect()->route('profile.show')->with('success', 'Profile image updated successfully');
}
}
?>
