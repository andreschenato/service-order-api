<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Service;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class ServiceQuery extends Query
{
    protected $attributes = [
        'name' => 'service',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Service');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id()
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Service::findOrFail($args['id']);
    }
}
