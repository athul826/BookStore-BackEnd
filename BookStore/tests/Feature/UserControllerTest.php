<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_SuccessfulRegistration()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])->json('POST', '/api/register', [
            "role" => "user",
            "first_name" => "Arun",
            "last_name" => "Vijay",
            "email" => "arunv@gmail.com",
            "phone_no" => "9946240864",
            "password" => "12345678",
            "confirm_password" => "12345678"
        ]);
        $response->assertStatus(201);
    }

    public function test_UnSuccessfulRegistration()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])->json('POST', '/api/register', [
            "role" => "user",
            "first_name" => "Arun",
            "last_name" => "Vijay",
            "email" => "arunv@gmail.com",
            "phone_no" => "9946240864",
            "password" => "12345678",
            "confirm_password" => "12345678"
        ]);
        $response->assertStatus(401);
    }
    /**
     * @test for
     * Successfull Login
     */
    public function test_SuccessfulLogin()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])->json(
            'POST',
            '/api/login',
            [
                "email" => "arunv@gmail.com",
                "password" => "12345678"
            ]
        );
        $response->assertStatus(200);
    }
    public function test_UnSuccessfulLogin()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])->json(
            'POST',
            '/api/login',
            [
                "email" => "unshdfgaf@gmail.com",
                "password" => "123456"
            ]
        );
        $response->assertStatus(404);
    }

    public function test_SuccessfulLogout()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTY5NzQxNSwiZXhwIjoxNjYxNzAxMDE1LCJuYmYiOjE2NjE2OTc0MTUsImp0aSI6IkZMMzNpcVBXVlFCTWcwTXciLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.l8DA9-6XQssmHV2c37BsxNDk-WZgLFl6Q_vX8DzcuwU'
        ])->json('POST', '/api/logout');
        $response->assertStatus(201);
    }

    public function test_SuccessfulForgotPassword()
    { {
            $response = $this->withHeaders([
                'Content-Type' => 'Application/json',
            ])->json('POST', '/api/forgotPassword', [
                "email" => "athult@gmail.com"
            ]);

            $response->assertStatus(201);
        }
    }

    public function test_SuccessfulResetPassword()
    { {
            $response = $this->withHeaders([
                'Content-Type' => 'Application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9mb3Jnb3RQYXNzd29yZCIsImlhdCI6MTY2MTIzNDQyNywiZXhwIjoxNjYxMjM4MDI3LCJuYmYiOjE2NjEyMzQ0MjcsImp0aSI6IlFUc2F5UlNDREtzQWxMbXIiLCJzdWIiOiIyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.MYLbqFGIMxYNdQunVroYnoFl3nJpIMzrBhhXNVj2nN8'
            ])->json('POST', '/api/resetpassword', [
                "new_password" => "225566",
                "confirm_password" => "225566"
            ]);

            $response->assertStatus(201);
        }
    }

    /**
     * @test for
     * UnSuccessfull resetpassword
     */
    public function test_UnSuccessfulResetPassword()
    { {
            $response = $this->withHeaders([
                'Content-Type' => 'Application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMxMTIzLCJleHAiOjE2NTAwMzQ3MjMsIm5iZiI6MTY1MDAzMTEyMywianRpIjoieFVGclc1RDVqcFcyUUZSNCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.sCq-hdGdst48xUyIe14aXKe03hLQxyMX6d_KUU8MWeI'
            ])->json('POST', '/api/resetpassword', [
                "new_password" => "athul12",
                "confirm_password" => "athul12"
            ]);

            $response->assertStatus(400)->assertJson(['message' => 'we cannot find the user with that e-mail address']);
        }
    }
}
