<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'name',
        'description',
        'author',
        'image',
        'Price',
        'quantity',

    ];

    public function adminOrUserVerification($currentUserId)
    {
        $adminId = User::select('id')->where([['role', '=', 'admin'], ['id', '=', $currentUserId]])->get();
        return $adminId;
    }
    public function saveBookDetails($request, $currentUser)
    {
        $book = new Book();
        //$path = Storage::disk('s3')->put('images', $request->image);
        //$url = env('AWS_URL') . $path;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/books', $fileName);
            $book->image = $fileName;
        }
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        $book->image = $request->input('image');
        //$book->image = $url;
        $book->Price = $request->input('Price');
        $book->quantity = $request->input('quantity');
        $book->user_id = $currentUser->id;
        $book->save();

        return $book;
    }

    public function findingBook($bookId)
    {
        $book = Book::where('id', $bookId)->first();
        return $book;
    }


    public static function updateBook($request, $book)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/books', $fileName);
            $book->image = $fileName;
        }
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->author = $request->input('author');
        // $book->image = $request->input('image');
        $book->Price = $request->input('Price');
        // $book->quantity = $request->input('quantity');

        // if ($request->image) {
        //     $path = str_replace(env('AWS_URL'), '', $book->image);

        //     if (Storage::disk('s3')->exists($path)) {
        //         Storage::disk('s3')->delete($path);
        //     }
        //     $path = Storage::disk('s3')->put('book_image', $request->image);
        //     $url = env('AWS_URL') . $path;
        //     $book->image = $url;
        // }

        $book->save();

        return $book;
    }
}
