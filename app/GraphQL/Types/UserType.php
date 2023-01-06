<?php
namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
class UserType extends GraphQLType{

    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => \App\Models\User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'User identification, primary key',
                'alias' => 'user_id',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'max:255'],
                'description' => 'The name of user',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'email', 'max:255', 'unique:users,email'],
                'description' => 'The email of user',
            ],
             'accessToken' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Session api token passport',
        ],
        ];
    }
}
