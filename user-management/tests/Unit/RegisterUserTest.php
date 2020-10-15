<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RegisterUserTest extends TestCase
{
    /**
     * @var Illuminate\Foundation\Testing\WithFaker
     * @var Illuminate\Foundation\Testing\RefreshDatabase;
     */
    use WithFaker, RefreshDatabase;

    /**
     * Admin user
     * 
     * @var App\User
     */
    private $admin;

    public function setUp():void {
        parent::setUp();
        $this->admin = $this->addUser('admin', true);
    }

    private function addUser(string $role = null, bool $status = false):User {
        return User::create($this->getUserParam($role, $status));
    }

    private function getUserParam(string $role, bool $status):Array {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'role' => $role,
            'status' => $status
        ];
    }

    public function testWithoutAuth() {
        $this->get('/users')->assertStatus(302);
    }

    public function testWithAdminSuccess() {
        $this->actingAs($this->admin)->get('/users')->assertStatus(200);
    }

    public function testRegisterUserAsAdmin() {
        $params = $this->getUserParam($this->faker->jobTitle, $this->faker->boolean);
        $this->actingAs($this->admin)->post('/users/register', $params)->assertStatus(302);
    }
}