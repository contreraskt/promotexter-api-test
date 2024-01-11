
# Promotexter API Test

I used the Laravel CRUD API based on common practices and conventions in Laravel development. 

I created a controller named ItemController using the `php artisan make:controller` command. Controllers handle HTTP requests and contain the logic for API operations.

In the controller, I defined methods for CRUD operations: `index` for fetching all items, `show` for fetching a specific item, `store` for creating a new item,`update` for updating an item, and `destroy` for deleting an item.

I defined API routes in the `routes/api.php` file. Routes map HTTP methods and URIs to controller methods.

Each route corresponds to a CRUD operation. For example, the GET /items route maps to the `index` method, `GET /items/{id}` maps to the show method, and so on.

I added validation rules using Laravel's validation system in the store and update methods. This helps ensure that incoming data is valid before it is processed.

I used Laravel's response functions (json, response) to format the API responses. For example, returning a JSON response with a status code of 201 for successful item creation.

By following these Laravel conventions and using its built-in features, the code becomes more readable, maintainable, and adheres to best practices in Laravel development.
## API Reference

#### Get all items

```http
 curl http://127.0.0.1:8000/api/items

```

#### Get Specific item

```http
 curl http://127.0.0.1:8000/api/items/{id}

```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Required**. Id of item to fetch |

#### Create New Item

```http
 curl -X POST -H "Content-Type: application/json" -d '{"name": "Added New Item"}' http://127.0.0.1:8000/api/items

```

#### Update New Item

```http
 curl -X PUT -H "Content-Type: application/json" -d '{"name": "Updated Item"}' http://127.0.0.1:8000/api/items/{id}

```

#### Delete an Item

```http
curl -X DELETE http://127.0.0.1:8000/api/items/{id}

```