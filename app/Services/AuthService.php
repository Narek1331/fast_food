<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService{

    // public function __construct(CategoryRepository $category_repo){
    //     $this->category_repo = $category_repo;
    // }

    public function changePassword($request)
    {
        $user = Auth::user();

        // Verify if the old password matches the one in the database
        if (!Hash::check($request['old_password'], $user['password'])) {
            return ['status' => 'error', 'message' => 'The provided old password does not match your current password.'];
        }

        // Update the user's password
        $user->password = Hash::make($request['password']);
        $user->save();

        return ['status' => 'success', 'message' => 'Password changed successfully.'];
    }
}
