<?php

namespace App\GraphQL\Queries;

use App\Models\Book;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UserRegistrationQuery extends Query
{

    protected $attributes = [
        'name' => 'register',
        'description' => 'A query to register user, returns the user and the access token'
    ];

    public function type(): Type
    {
        return GraphQL::type('UserType');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required', 'max:255'],
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
                'rules' => ['required', 'email', 'max:255'],
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string(),
                'rules' => ['required', 'min:6'],
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return (new RegisterLogic(
            $args['name'],
            $args['email'],
            $args['password']
        ))->register();
    }
}

class RegisterLogic {

    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function register()
    {
        //create the auth user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        //create the access token
        $token = $user->createToken('authToken')->accessToken;

        //return the user and the access token
        return [
            'accessToken' => $token
        ];
    }
}

