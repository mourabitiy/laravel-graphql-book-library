<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteBookMutation extends Mutation{
    protected $attributes = [
        'name' => 'deleteBook'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
      $book = Book::find($args['id']);
        if($book->delete()){
            return true;
        }
        return false;
    }
}
