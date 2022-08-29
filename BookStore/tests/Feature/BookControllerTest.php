<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Tests\TestCase;

class BookControllerTest extends TestCase
{

    protected static $token;
    protected static $id;
    protected static $image;
    public static function setUpBeforeClass(): void
    {


        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg');
        self::$image = $file->hashName();
    }
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

    public function test_SuccessfullAddingBook()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0ODA1NSwiZXhwIjoxNjYxNzUxNjU1LCJuYmYiOjE2NjE3NDgwNTUsImp0aSI6Ik8wRTNjd2JldG9PSk84WWEiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.00tn78EFMcNQnG6R81LAvTGyjg8sssKiqypKTCRinWA'
        ])->json('POST', '/api/addingBook', [
            "name" => "LDJSAAS",
            "description" => "IPL ARTICLE",
            "author" => "Anil",
            "image" => self::$image,
            "Price" => "1000",
            "quantity" => "10",
        ]);
        $response->assertStatus(200);
    }

    public function test_SuccessfullAddQuantityToExistingBook()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0ODA1NSwiZXhwIjoxNjYxNzUxNjU1LCJuYmYiOjE2NjE3NDgwNTUsImp0aSI6Ik8wRTNjd2JldG9PSk84WWEiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.00tn78EFMcNQnG6R81LAvTGyjg8sssKiqypKTCRinWA'
        ])->json(
            'POST',
            '/api/addQuantityToExistBook',
            [
                "id" => "5",
                "quantity" => "7"
            ]
        );
        $response->assertStatus(201);
    }

    public function test_UnSuccessfullAddQuantityToExistingBook()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMxODM4LCJleHAiOjE2NTAwMzU0MzgsIm5iZiI6MTY1MDAzMTgzOCwianRpIjoiYzhMV2hkMU9MTjRsaXREeCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.j6WmGlYAb4g7IIRlI5PjLEPcx8dKjYlx4oIuqZhi_Jw'
        ])->json(
            'POST',
            '/api/addQuantityToExistBook',
            [
                "id" => "75",
                "quantity" => "5"
            ]
        );
        $response->assertStatus(404);
    }

    public function test_SuccessfullDeleteBook()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2MTc0ODA1NSwiZXhwIjoxNjYxNzUxNjU1LCJuYmYiOjE2NjE3NDgwNTUsImp0aSI6Ik8wRTNjd2JldG9PSk84WWEiLCJzdWIiOjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.00tn78EFMcNQnG6R81LAvTGyjg8sssKiqypKTCRinWA'
        ])->json(
            'POST',
            '/api/deleteBookById',
            [
                "id" => "4",
            ]
        );
        $response->assertStatus(201);
    }

    public function test_UnSuccessfullDeleteBook()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjUwMDMxODM4LCJleHAiOjE2NTAwMzU0MzgsIm5iZiI6MTY1MDAzMTgzOCwianRpIjoiYzhMV2hkMU9MTjRsaXREeCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.j6WmGlYAb4g7IIRlI5PjLEPcx8dKjYlx4oIuqZhi_Jw'
        ])->json(
            'POST',
            '/api/deleteBookById',
            [
                "id" => "50",
            ]
        );
        $response->assertStatus(404);
    }
}
