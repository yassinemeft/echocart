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


/**
 * Delete the authenticated user's account.
 *
 * This method removes the user from the database, invalidates the session,
 * regenerates the session token, and redirects to the home page with a success message.
 *
 * @param \Illuminate\Http\Request $request The HTTP request instance.
 * @return \Illuminate\Http\RedirectResponse Redirects to the home page.
 */

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

            // Supprimer l'utilisateur de la base de données
            User::destroy($user->id);

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('home')->with('success', 'Your account has been deleted successfully.'); 
    }


    
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir votre profil.');
        }

        return view('profile', compact('user'));
    }


    /**
     * Edit the authenticated user's profile information.
     *
     * This function validates the incoming request data for updating
     * the user's profile, including name, email, phone, and address.
     * It ensures the email is unique across users, except for the current user.
     * If validation passes and the user is found, it updates the user's information
     * in the database and redirects to the profile page with a success message.
     * If the user is not found, it redirects back with an error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function editProfile(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);


        // Get the authenticated user
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }



    /**
     * Update the authenticated user's profile image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImg(Request $request)
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
