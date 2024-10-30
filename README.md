# Services Order GraphQL API

## Sobre o projeto

Este projeto foi desenvolvido como estudo da criação de uma [API GraphQL](https://graphql.org/). Foi utilizado o pacote [rebing/graphql-laravel](https://github.com/rebing/graphql-laravel) para permitir o uso de GraphQL no Laravel.

Abaixo estão listados os tipos, queries e mutations disponíveis nesta API:

### Tipos
- UserType
- CustomerType
- ServiceType
- OrderType 

### Queries
- OrderQuery
- OrdersQuery
- UserQuery
- UsersQuery
- CustomerQuery
- CustomersQuery
- ServiceQuery
- ServicesQuery

### Mutations
- CreateOrderMutation 
- CreateUserMutation
- CreateCustomerMutation
- CreateServiceMutation
- UpdateServiceMutation
- UpdateOrderMutation
- UpdateCustomerMutation
- UpdateUserMutation
- DeleteOrderMutation
- DeleteUserMutation
- DeleteCustomerMutation
- DeleteServiceMutation

## Como rodar o projeto

Para rodar o projeto localmente, recomenda-se possuir o docker instalado e utilizar o [Sail](https://laravel.com/docs/11.x/sail). Se você tiver o docker instalado, basta rodar usando `./vendor/bin/sail up` (se você tiver configurado o alias, é só usar `sail up`). Após isso, rode o comando `sail artisan migrate` e pronto! Você pode acessar uma interface gráfica (GraphiQl) pela URL [localhost/graphiql](http://localhost/graphiql), nela estão documentados as mutations, queries e tipos.