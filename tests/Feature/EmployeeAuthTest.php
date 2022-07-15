<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeAuthTest extends TestCase
{

    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */




    public function testRegister()
    {
        $faker = \Faker\Factory::create();


        $payload = [
            'name' => $this->faker->firstName,
            'email' => $this->faker->email,
            'password'=>'12345678',
            'c_password'=>'12345678',
        ];

        $response = $this->json('POST', '/api/auth/employee/register', $payload);


        //Write the response in laravel.log

        $response->assertStatus(200);

        // Receive our token
        // $this->assertArrayHasKey('token', $response->json()['data']);
    }

    public function testLogin()
    {
        // Creating Users
        $em = Employee::first();

        // Simulated landing
        $response = $this->json('POST','/api/auth/employee/login',[
            'email' => $em->email,
            'password' => 12345678,
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        // Determine whether the login is successful and receive token 
        $response->assertStatus(200);

        // $this->assertArrayHasKey('token', $response->json()['data']);

    }
}
