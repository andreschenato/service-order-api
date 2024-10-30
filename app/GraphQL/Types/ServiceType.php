<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Service;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ServiceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Service',
        'model' => Service::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The service id',
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'The id of the user that the service belongs to'
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
}
