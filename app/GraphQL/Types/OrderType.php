<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class OrderType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Order',
        'model' => Order::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The id of an order',
            ],
            'problem' => [
                'type' => Type::nonNull(Type::string()), 
                'description' => 'The description of a problem of the customer',
            ],
            'solution' => [
                'type' => Type::string(),
                'description' => 'The description of a solution for the problem',
            ],
            'total' => [
                'type' => Type::float(),
                'description' => 'The total value of the order',
            ],
            'services' => [
                'type' => Type::listOf(GraphQL::type('Service')),
                'description' => 'The services that the order have',
            ],
            'customer' => [
                'type' => GraphQL::type('Customer'),
                'description' => 'The customers that the order belongs to',
            ],
            'user' => [
                'type' => GraphQL::type('User'),
                'description' => 'The user that the order belongs to',
            ]
        ];
    }
}
