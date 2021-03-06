<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     * @return array
     */
    public function definition()
    {
        $type = ['moderator', 'author'];
        $name = [$this->faker->firstNameMale, $this->faker->firstNameFemale];
        $gender = ['male', 'female'];
        return [
            'firstname' => $name[rand(0, 1)],
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'type' => $type[rand(0, 1)],
            'gender' => $gender[rand(0, 1)],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];
    }
}
