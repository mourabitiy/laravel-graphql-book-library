<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateBookMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createBook'
    ];

    public function type(): Type
    {
        return GraphQL::type('Book');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'author' => [
                'name' => 'author',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'language' => [
                'name' => 'language',
                'type' => Type::nonNull(Type::string()),
            ],
            'category' => [
                'name' => 'category',
                'type' => Type::nonNull(Type::string()),
            ],
            'page_count' => [
                'name' => 'page_count',
                'type' => Type::nonNull(Type::int()),
            ],
            'publisher' => [
                'name' => 'publisher',
                'type' => Type::nonNull(Type::string()),
            ],
            'isbn' => [
                'name' => 'isbn',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $book = new Book();
        $book->fill($args);
        $book->save();
        return $book;
    }
}
