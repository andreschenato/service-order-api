<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Customer;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateCustomerMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createCustomer',
    ];

    public function type(): Type
    {
        return GraphQL::type('Customer');
    }

    public function args(): array
    {
        return [
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
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Customer::create($args);
    }
}
