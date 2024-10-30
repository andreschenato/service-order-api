<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Customer;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class CustomerQuery extends Query
{
    protected $attributes = [
        'name' => 'customer',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Customer');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id(),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Customer::findOrFail($args['id']);
    }
}
