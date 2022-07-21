<?php


namespace Database\Factories;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     *
     * @throws Exception
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => Str::random(10),
            'email' => $this->faker->email(),
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password' => '',
            'repassword' => 0,
            'passwordmd5' => Str::random(40),
            'passwordsha512' => Str::random(40),
            'passwordhash' => Hash::make(Str::random(40)),
            'salt' => '',
            'remember_token' => Str::random(40),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
