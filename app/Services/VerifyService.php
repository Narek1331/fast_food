<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class VerifyService
{
    /**
     * Store the verification token for a user.
     *
     * @param  int     $id     The user ID.
     * @param  string  $token  The verification token.
     * @return void
     */
    public function storeToken(int $id, string $token): void
    {
        DB::table('user_verifications')->insert([
            'id' => $id,
            'token' => $token,
        ]);
    }

    /**
     * Destroy the verification token for a user.
     *
     * @param  int     $id     The user ID.
     * @param  string  $token  The verification token.
     * @return void
     */
    public function destroyToken(int $id, string $token): void
    {
        $user = User::find($id);
        $user->email_verified_at = now(); // Assuming you're using Laravel's default email verification feature

        $user->save(); // Save the changes to the database

        DB::table('user_verifications')
            ->where('id', $id)
            ->where('token', $token)
            ->delete();
    }

    /**
     * Check if a verification token exists for a user.
     *
     * @param  int     $id     The user ID.
     * @param  string  $token  The verification token.
     * @return bool            True if the token exists, false otherwise.
     */
    public function existsToken(int $id, string $token): bool
    {
        return DB::table('user_verifications')
            ->where('id', $id)
            ->where('token', $token)
            ->exists();
    }
}
