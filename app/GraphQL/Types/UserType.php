<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The use id',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The user name',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The user email',
            ],
            'orders' => [
                'type' => Type::listOf(GraphQL::type('Order')),
                'description' => 'The orders that belongs to the user'
            ],
            'customers' => [
                'type' => Type::listOf(GraphQL::type('Customer')),
                'description' => 'The customers that belongs to the user',
            ],
            'services' => [
                'type' => Type::listOf(GraphQL::type('Service')),
                'description' => 'The services that belongs to the user',
            ]
        ];
    }
}
