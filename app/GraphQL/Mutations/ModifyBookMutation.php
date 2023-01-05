<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class ModifyBookMutation extends Mutation{
    protected $attributes = [
        'name' => 'updateBook'
    ];

    public function type(): Type
    {
        return GraphQL::type('Book');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ],
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
        $book = Book::find($args['id']);
        $book->title = $args['title'];
        $book->author = $args['author'];
        $book->language = $args['language'];
        $book->category = $args['category'];
        $book->page_count = $args['page_count'];
        $book->publisher = $args['publisher'];
        $book->isbn = $args['isbn'];
        $book->save();

        return $book;
    }
}
