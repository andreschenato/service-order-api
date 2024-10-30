<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Order;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CustomerType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Customer',
        'model' => Customer::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The customer id',
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'The user id that a customer belongs to'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of a customer',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of a customer',
            ],
            'phone_number' => [
                'type' => Type::string(),
                'description' => 'The phone number of a customer',
            ],
            'postal_code' => [
                'type' => Type::string(),
                'description' => 'The postal code of a customer',
            ],
            'address' => [
                'type' => Type::string(),
                'description' => 'The address of a customer'
            ],
            'orders' => [
                'type' => Type::listOf(GraphQL::type('Order')),
                'description' => 'The orders of a customer'
            ],
        ];
    }
}
