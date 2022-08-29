<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartControllerTest extends TestCase
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
     * @test
     * for add book to cart successfull
     */
    public function test_SuccessfullAddToCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzkzNSwiZXhwIjoxNjYxNzUxNTM1LCJuYmYiOjE2NjE3NDc5MzUsImp0aSI6InhwUGFVOXdMQ2xVaVlxZXMiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.rtwLXsgC9gKOyTZHDnracv-GCGcGanf_pSm9FfqU5B8'
        ])->json(
            'POST',
            '/api/addBookToCartByBookId',
            [
                "book_id" => "4",
            ]
        );
        $response->assertStatus(200);
    }

    /**
     * @test
     * for Unsuccessfull add book to cart
     */
    public function test_UnSuccessfullAddToCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMyMjQyLCJleHAiOjE2NTAwMzU4NDIsIm5iZiI6MTY1MDAzMjI0MiwianRpIjoic2RIakdsUHdFS2dSMU02VSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.6-tSbrouTVvC4cCETZ3plDJKtLO1Sysx2YP1eKNXoH4'
        ])->json(
            'POST',
            '/api/addBookToCartByBookId',
            [
                "book_id" => "20",
            ]
        );
        $response->assertStatus(404);
    }

    /**
     * @test
     * for delet book from cart successfull
     */
    public function test_SuccessfullAddDeleteFromCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzkzNSwiZXhwIjoxNjYxNzUxNTM1LCJuYmYiOjE2NjE3NDc5MzUsImp0aSI6InhwUGFVOXdMQ2xVaVlxZXMiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.rtwLXsgC9gKOyTZHDnracv-GCGcGanf_pSm9FfqU5B8'
        ])->json(
            'POST',
            '/api/deleteBookByCartId',
            [
                "id" => "8",
            ]
        );
        $response->assertStatus(201);
    }

    /**
     * @test
     * for delet book from cart Unsuccessfull
     */
    public function test_UnSuccessfullAddDeleteFromCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMyMjQyLCJleHAiOjE2NTAwMzU4NDIsIm5iZiI6MTY1MDAzMjI0MiwianRpIjoic2RIakdsUHdFS2dSMU02VSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.6-tSbrouTVvC4cCETZ3plDJKtLO1Sysx2YP1eKNXoH4'
        ])->json(
            'POST',
            '/api/deleteBookByCartId',
            [
                "id" => "25",
            ]
        );
        $response->assertStatus(404);
    }

    /**
     * @test
     * for Successfull Cart update by adding quantity
     */
    public function test_SuccessfullUpdateCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzkzNSwiZXhwIjoxNjYxNzUxNTM1LCJuYmYiOjE2NjE3NDc5MzUsImp0aSI6InhwUGFVOXdMQ2xVaVlxZXMiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.rtwLXsgC9gKOyTZHDnracv-GCGcGanf_pSm9FfqU5B8'
        ])->json(
            'POST',
            '/api/increamentBookQuantityInCart',
            [
                "id" => "8",
                "book_quantity" => "5",
            ]
        );
        $response->assertStatus(201);
    }

    /**
     * @test
     * for Successfull Cart update by adding quantity
     */
    public function test_UnSuccessfullUpdateCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMyMjQyLCJleHAiOjE2NTAwMzU4NDIsIm5iZiI6MTY1MDAzMjI0MiwianRpIjoic2RIakdsUHdFS2dSMU02VSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.6-tSbrouTVvC4cCETZ3plDJKtLO1Sysx2YP1eKNXoH4'
        ])->json(
            'POST',
            '/api/increamentBookQuantityInCart',
            [
                "id" => "25",
                "book_quantity" => "5",
            ]
        );
        $response->assertStatus(404);
    }

    /**
     * @test for successfull display all bokks
     * present in the cart
     */
    public function test_SuccessfullDisplayBooksFromCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0NzkzNSwiZXhwIjoxNjYxNzUxNTM1LCJuYmYiOjE2NjE3NDc5MzUsImp0aSI6InhwUGFVOXdMQ2xVaVlxZXMiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.rtwLXsgC9gKOyTZHDnracv-GCGcGanf_pSm9FfqU5B8'
        ])->json(
            'GET',
            '/api/getAllBooksInCart',
            []
        );
        $response->assertStatus(201);
    }

    /**
     * @test for Unsuccessfull display all bokks
     * present in the cart
     */
    public function test_UnSuccessfullDisplayBooksFromCart()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMyMjQyLCJleHAiOjE2NTAwMzU4NDIsIm5iZiI6MTY1MDAzMjI0MiwianRpIjoic2RIakdsUHdFS2dSMU02VSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.6-tSbrouTVvC4cCETZ3plDJKtLO1Sysx2YP1eKNXij5'
        ])->json(
            'GET',
            '/api/getAllBooksInCart',
            []
        );
        $response->assertStatus(404);
    }
}
