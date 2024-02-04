<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

        ];
    }

    public function admin()
    {
        return $this->state([
            'role' => 'Admin'
        ]);
    }

    /**
     * Memberikan nilai default untuk peran "super admin".
     *
     * @return RoleFactory
     */
    public function superAdmin()
    {
        return $this->state([
            'role' => 'Super Admin'
        ]);
    }
}
