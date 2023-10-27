<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\WithFileUploads;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    use WithFileUploads;

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */

    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    public function saveProfilePhoto()
    {
        // $this->validate([
        //     'photo' => 'nullable|image|max:1024', // Add any additional validation rules you need
        // ]);

        if ($this->photo) {
            // Store the uploaded photo in the desired directory
            $filePath = $this->photo->store('profile-photos', 'public');

            // Update the profile_photo_url column of the authenticated user
            auth()->user()->update([
                'profile_photo_url' => $filePath,
            ]);
        }

        // Other logic related to saving profile information to the database
        // ...

        // Redirect or emit an event to notify the user that the save operation was successful
        // ...
    }
}