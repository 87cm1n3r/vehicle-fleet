
# Vehicle Fleet



## Quick Start
``` bash
composer install
php artisan migrate
npm install
npm run dev
php artisan serve
```
## Database Seeding
``` bash
php artisan db:seed
```
  
## API Reference

#### Get all vehicles

```http
  GET /api/vehicles
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `search`  | `string` | Search query |
| `sort_col`  | `string` | Sort by column |
| `sort_dir`  | `string` | Sort direction asc/desc |
| `per_page`  | `int` | Items per page |
| `page`  | `int` | Page |

#### Get vehicle

```http
  GET /api/vehicles/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |

#### Delete vehicle

```http
  DELETE /api/vehicles/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Vehicle Id |


#### Create vehicle

```http
  POST /api/vehicles
```

| Body parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | Vehicle name |
| `registration_number`      | `string` | Registration number |
| `mileage`      | `int` | Mileage |

#### Update vehicle

```http
  PUT /api/vehicles
```

| Body parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Vehicle Id |
| `name`      | `string` | Vehicle name |
| `registration_number`      | `string` | Registration number |
| `mileage`      | `int` | Mileage |

  