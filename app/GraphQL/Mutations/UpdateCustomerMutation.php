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

class UpdateCustomerMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateCustomer',
    ];

    public function type(): Type
    {
        return GraphQL::type('Customer');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The customer id',
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
        $customer = Customer::findOrFail($args['id']);
        $customer->update($args);
        return $customer->refresh();
    }
}
