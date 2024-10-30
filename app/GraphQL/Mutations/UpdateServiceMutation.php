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

class UpdateServiceMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateService',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('Service');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The service id',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of a service',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of a service',
            ],
            'price' => [
                'type' => Type::float(),
                'description' => 'The price of a service',
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $service = Service::findOrFail($args['id']);
        $service->update($args);
        return $service->refresh();
    }
}
