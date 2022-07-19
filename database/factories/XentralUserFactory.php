<?php

namespace Database\Factories;

use App\Models\XentralUser;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class XentralUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = XentralUser::class;

    /**
     * Define the model's default state.
     *
     *
     * @throws Exception
     * @return array
     */
    public function definition(): array
    {
        return [
            'adresse' => random_int(1,5),
            'passwordmd5' => $this->faker->regexify(bcrypt('[A-Za-z0-9]{10}')),
            'passwordsha512' => $this->faker->regexify(bcrypt('[A-Za-z0-9]{10}')),
            'passwordhash' => $this->faker->regexify(bcrypt('[A-Za-z0-9]{10}')),
            'salt' => $this->faker->regexify(bcrypt('[A-Za-z0-9]{10}')),
            'password' => $this->faker->regexify(bcrypt('[A-Za-z0-9]{10}')),
            'repassword' => $this->faker->regexify(bcrypt('[A-Za-z0-9]{10}')),
            'remember_token' => $this->faker->regexify(bcrypt('[A-Za-z0-9]{10}')),
            'firma' => 1,
            'hwtoken' => random_int(3,4),
            'logdatei' => now(),
            'username' => $this->faker->regexify('[a-z]{10}'),
            'settings' => "Tjs=",
            'activ' => 1,
            'type' => "standard",
            'standardetikett' => 5,
            'externlogin' => 1,
            'email_bevorzugen' => 1,
            'startseite' => "index.php?module=welcome&action=start0",
            'sprachebevorzugen' => "deutsch",
            'chat_popup' => 1,
            'defaultcolor' => "#FFFFFF",
            'callcenter_notification' => 1,

        ];
    }
}
