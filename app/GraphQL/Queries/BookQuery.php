<?php
namespace App\GraphQL\Queries;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class BookQuery extends Query{
    protected $attributes = [
        'name' => 'book'
    ];


    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Book'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'isbn' => [
                'name' => 'isbn',
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Book::where('id', $args['id'])->get();
        } elseif (isset($args['isbn'])) {
            return Book::where('isbn', $args['isbn'])->get();
        }
        return Book::all();
    }
}
