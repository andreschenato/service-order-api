<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateUser',
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The use id',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The user name',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The user email',
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'The user password',
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $user = User::findOrFail($args['id']);
        $user->update($args);
        return $user->refresh();
    }
}
