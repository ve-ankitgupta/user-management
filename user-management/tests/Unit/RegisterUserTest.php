<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
// use Faker\Generator as Faker;

class RegisterUserTest extends TestCase
{
    /**
     * @var Illuminate\Foundation\Testing\WithFaker
     * @var Illuminate\Foundation\Testing\RefreshDatabase;
     */
    use WithFaker, RefreshDatabase;

    protected $admin;

    // public function setUp():void {
    //     $this->faker = new Faker;
    //     parent::setUp();
    //     $this->addAdmin();
    // }

    // private function addAdmin() {
    //     $this->admin = User::create([
    //         'name' => $this->faker->name,
    //         'email' => $faker->unique()->safeEmail,
    //         'password' => $this->faker->password,
    //         'role' => 'admin',
    //         'status' => true
    //     ]);
    // }

    // public function testRegisterUserSuccess() {
    //     dd(get_class_methods($this->faker));
    //     $this->actingAs($this->admin)->post('/users/register', [
    //         'name' => $this->faker->name,
    //         'email' => $faker->unique()->safeEmail,
    //         'password' => $this->faker->password,
    //         'role' => $this->faker->userName,
    //         'status' => $this->faker->boolean
    //     ])->assertRedirect('/users');
    // }
}