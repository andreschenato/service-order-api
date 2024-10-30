<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Service;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateServiceMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createService',
    ];

    public function type(): Type
    {
        return GraphQL::type('Service');
    }

    public function args(): array
    {
        return [
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user that the service belongs to',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of a service',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The description of a service',
            ],
            'price' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'The price of a service',
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Service::create($args);
    }
}
