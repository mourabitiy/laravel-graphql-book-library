<?php

namespace App\GraphQL\Types;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BookType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Book',
        'description' => 'Collestion of Books in the Library',
        'model' => Book::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the selected book',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of book',
            ],
            'author' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the author of book',
            ],
            'language' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The language which the book is written in',
            ],
            'category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The category of book',
            ],
            'page_count' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The page count of book',
            ],
            'publisher' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The publisher of book',
            ],
            'isbn' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The isbn of book',
            ],
        ];
    }
}
