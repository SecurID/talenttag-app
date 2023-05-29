<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthdate' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'street' => $this->faker->streetName(),
            'housenumber' => $this->faker->buildingNumber(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
            'club' => $this->getRandomClub(),
            'position' => $this->faker->word(),
            'accepted_disclaimer' => $this->faker->boolean(),
        ];
    }

    private function getRandomClub(): string
    {
        $clubs = [
            '1. FC Erlensee',
            'TV 73 Würzburg',
            '1. FC Königsstein',
            'Spvgg. Oberrad',
        ];
        return $clubs[rand(0,3)];
    }
}
