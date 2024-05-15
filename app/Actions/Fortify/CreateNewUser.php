<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[0-9]).{8,}$/', 'confirmed'],
            'referal_person' => ['required', 'string', 'max:255','exists:users,name'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'referal_person' => $input['referal_person'],
            'password' => bcrypt($input['password']),
        ]);
    
        // Fetch the referral person's record and add 100 points
        $referralPerson = User::where('name', $input['referal_person'])->first();
        if ($referralPerson) {
            $referralPerson->referal_rewards += 100;
            $referralPerson->referal_count += 1;
            $referralPerson->save();
        }
    
        return $user;
    }
}
