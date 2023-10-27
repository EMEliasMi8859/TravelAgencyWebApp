<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileUpdate extends Controller
{
    
    // Retrieve the current ID
    public function RegCusGet(Request $request){
        $user = $request->user();
    
        // Validate and update other profile information fields
        $request->validate([
            // Add your validation rules for other fields here
        ]);
    
        // Handle profile picture upload
        if ($request->hasFile('profile_photo_path')) {
            $photoPath = $request->file('profile_photo_path')->store('profiles', 'public/rawdata/profiles');
            $user->profile_photo_path = 'rawdata/profiles/' . $photoPath;
        }
        return view('profile.show');
    }
}
