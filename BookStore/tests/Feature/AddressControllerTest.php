<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressControllerTest extends TestCase
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

    /**
     * @test for
     * Address add to respective user successfull
     *
     */

    public function test_SuccessfulAddAddress()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzIwMCwiZXhwIjoxNjYxNzUwODAwLCJuYmYiOjE2NjE3NDcyMDAsImp0aSI6Ik42VGpPTGt4N3BWMENjNDUiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.elrLLjPzyP0Pu8OMvBp7JO558RKrgTeylt6w9zI6Lag'
        ])->json('POST', '/api/addAddress', [
            "address" => "tharol",
            "city" => "calicut",
            "state" => "kerala",
            "landmark" => "near market road",
            "pincode" => "673106",
            "address_type" => "home",
        ]);
        $response->assertStatus(201);
    }

    public function test_UnSuccessfulAddAddress()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMzMDkwLCJleHAiOjE2NTAwMzY2OTAsIm5iZiI6MTY1MDAzMzA5MCwianRpIjoiT2RSRkEybU9DbGVzTkpGQiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.VVZe9Jvto9Y15k60AQwcIdsxesrakO_BbfvFRPRjHok'
        ])->json('POST', '/api/addAddress', [
            "address" => "jammu",
            "city" => "pankogh",
            "state" => "kashmir",
            "landmark" => "near shiva temple",
            "pincode" => "500038",
            "address_type" => "home",
        ]);
        $response->assertStatus(200);
    }

    /**
     * @test for
     * Address Update to respective user successfull
     *
     */
    public function test_SuccessfulUpdateAddress()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzIwMCwiZXhwIjoxNjYxNzUwODAwLCJuYmYiOjE2NjE3NDcyMDAsImp0aSI6Ik42VGpPTGt4N3BWMENjNDUiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.elrLLjPzyP0Pu8OMvBp7JO558RKrgTeylt6w9zI6Lag'
        ])->json('POST', '/api/updateAddress', [
            "id" => "4",
            "address" => "kainaty",
            "city" => "vadakara",
            "state" => "kerala",
            "landmark" => "water tank",
            "pincode" => "500037",
            "address_type" => "home",
        ]);
        $response->assertStatus(200);
    }

    /**
     * @test for
     * Address Update to respective user Unsuccessfull
     *
     */
    public function test_UnSuccessfulUpdateAddress()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMzMDkwLCJleHAiOjE2NTAwMzY2OTAsIm5iZiI6MTY1MDAzMzA5MCwianRpIjoiT2RSRkEybU9DbGVzTkpGQiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.VVZe9Jvto9Y15k60AQwcIdsxesrakO_BbfvFRPRjHok'
        ])->json('POST', '/api/updateAddress', [
            "id" => "65",
            "address" => "karnataka",
            "city" => "bangalore",
            "state" => "karnataka",
            "landmark" => "kr market",
            "pincode" => "568568",
            "address_type" => "home",
        ]);
        $response->assertStatus(201);
    }

    /**
     * @test
     * for delete address successfull
     */
    public function test_SuccessfullDeleteAddress()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzIwMCwiZXhwIjoxNjYxNzUwODAwLCJuYmYiOjE2NjE3NDcyMDAsImp0aSI6Ik42VGpPTGt4N3BWMENjNDUiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.elrLLjPzyP0Pu8OMvBp7JO558RKrgTeylt6w9zI6Lag'
        ])->json(
            'POST',
            '/api/deleteAddress',
            [
                "id" => 5,
            ]
        );
        $response->assertStatus(200);
    }

    /**
     * @test for successfull display all Address
     * for respective user
     */
    public function test_SuccessfullDisplayAddress()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzIwMCwiZXhwIjoxNjYxNzUwODAwLCJuYmYiOjE2NjE3NDcyMDAsImp0aSI6Ik42VGpPTGt4N3BWMENjNDUiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.elrLLjPzyP0Pu8OMvBp7JO558RKrgTeylt6w9zI6Lag'
        ])->json(
            'GET',
            '/api/getAddress',
            []
        );
        $response->assertStatus(201);
    }

    /**
     * @test for Unsuccessfull display all Address
     * for respective user
     */
    public function test_UnSuccessfullDisplayAddress()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMzMDkwLCJleHAiOjE2NTAwMzY2OTAsIm5iZiI6MTY1MDAzMzA5MCwianRpIjoiT2RSRkEybU9DbGVzTkpGQiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.VVZe9Jvto9Y15k60AQwcIdsxesrakO_BbfvFRPRjHok'
        ])->json(
            'GET',
            '/api/getAddress',
            []
        );
        $response->assertStatus(404);
    }
}
