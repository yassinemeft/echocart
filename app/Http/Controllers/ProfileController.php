<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure the User model is imported
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $orders = $user->orders; // Supposons que l'utilisateur a une relation "orders"
        return view('profile', compact('user', 'orders'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($user->profile_image) {
            Storage::delete($user->profile_image);
        }

        $path = $request->file('profile_image')->store('profile_images', 'public');

        $user->profile_image = $path;

        return redirect()->route('profile.show')->with('success', 'Profile image updated successfully.');
    }
}
?>
