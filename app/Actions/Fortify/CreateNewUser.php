<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Models\Commerce;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'commerce_name' => ['required','string','max:255'],
            'email'         => ['required','string','email','max:255', Rule::unique(User::class)],
            'password'      => $this->passwordRules(),
        ])->validate();

        return DB::transaction(function() use($input){
            $slugBase = Str::slug($input['commerce_name']);
            $slug = $slugBase;
            $count = 1;

            while (Commerce::where('slug', $slug)->exists()){
                $slug = "{$slugBase}-{$count}";
                $count++;
            }

            $commerce = Commerce::create([
                'name'          => $input['commerce_name'],
                'slug'          => $slug,
                'status'        => 'trialing',
                'trial_ends_at' => now()->addDays(7),
            ]);

            return User::create([
                'commerce_id'   => $commerce->id,
                'email'         => $input['email'],
                'password'      => Hash::make($input['password']),
                'role'          => 'owner',
                'provider'      => 'direct',
            ]);
        });
    }
}
