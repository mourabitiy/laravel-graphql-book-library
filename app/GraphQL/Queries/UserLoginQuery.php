<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginQuery extends Query
{
    protected $attributes = [
        'name' => 'login',
        'description' => 'A query to login user, returns the user and the access token'
    ];

    public function type(): Type
    {
        return GraphQL::type('UserType');
    }

    public function args(): array
    {
        return [
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
       return (new LoginLogic(
            $args['email'],
            $args['password']
        ))->login();
    }
}


class LoginLogic {

    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function login()
    {
        if (Auth::check()) {
            return Auth::user();
        }

        $user = User::where(['email' => $this->email])->first();

        if (! $user || ! Hash::check($this->password, $user->password)) {
            throw new \Exception('The provided credentials are incorrect.');
        }

        $user['accessToken'] = $user->createToken('mourabitiy.enginner/laravelGraphQLAPI')->accessToken;

        return $user;
    }
}

