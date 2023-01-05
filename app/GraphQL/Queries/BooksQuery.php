<?php

namespace App\GraphQL\Queries;

use App\Models\Book;
use GraphQL\Error\Error;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

//create the class to get the books by category or all books
class BooksQuery extends Query
{
    protected $attributes = [
        'name' => 'books'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Book'));
    }

    public function args(): array
    {
        return [
            //get by title of book
            'title' => [
                'name' => 'title',
                'type' => Type::string(),
            ],
            'category' => [
                'name' => 'category',
                'type' => Type::string(),
            ],
            'author' => [
                'name' => 'author',
                'type' => Type::string(),
            ],
            'language' => [
                'name' => 'language',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['category'])) {
            $result = Book::where('category', $args['category'])->get();
            if($result->count() <= 0){
                return new Error('No books found in this category');
            }
            return $result;
        }
        if (isset($args['title'])) {
            $result = Book::where('title', 'like', '%' . $args['title'] . '%')->get();
            if($result->count() <= 0){
                return new Error('No books found with this title');
            }
            return $result;
        }
        if (isset($args['author'])) {
            $result = Book::where('author', 'like', '%' . $args['author'] . '%')->get();
            if($result->count() <= 0){
                return new Error('No books found with this author');
            }
            return $result;
        }
        if (isset($args['language'])) {
            $result = Book::where('language', 'like', '%' . $args['language'] . '%')->get();
            if($result->count() <= 0){
                return new Error('No books found with this language');
            }
            return $result;
        }
        if(Book::all()->isEmpty()){
                return new Error('No books found');
        }
        return Book::all();
    }
}
/*query by category

*/
