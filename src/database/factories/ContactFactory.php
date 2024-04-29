<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 郵便番号、建物を除く住所部分のみを生成
        $address = $this->faker->address;
        $address = Str::after($address, '  ');
        $address = Str::beforeLast($address, ' ');

        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->firstname,
            'last_name' => $this->faker->lastname,
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail,
            'tell' => $this->faker->phoneNumber,
            'address' => $address,
            'building' => $this->faker->optional()->secondaryAddress,
            'detail' => $this->faker->realText(120,5),
        ];
    }
}
