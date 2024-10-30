<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Order;
use App\Models\Service;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateOrderMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createOrder',
    ];

    public function type(): Type
    {
        return GraphQL::type('Order');
    }

    public function args(): array
    {
        return [
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The user id',
            ],
            'customer_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The customer id',
            ],
            'problem' => [
                'type' => Type::nonNull(Type::string()), 
                'description' => 'The description of a problem of the customer',
            ],
            'solution' => [
                'type' => Type::string(),
                'description' => 'The description of a solution for the problem',
            ],
            'services_id' => [
                'type' => Type::listOf(Type::int()),
                'description' => 'O id dos serviços'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $order = Order::create($args);
        if(isset($args['services_id']) && !empty($args['services_id'])) {
            $total = round(Service::whereIn('id', $args['services_id'])->sum('price'), 2);
            $order->services()->sync($args['services_id']);
            $order->update(['total' => $total]);
        }
        return $order;
    }
}
