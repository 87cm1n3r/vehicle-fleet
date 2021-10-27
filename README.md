![Vue.js](https://img.shields.io/badge/vuejs-%2335495e.svg?style=for-the-badge&logo=vuedotjs&logoColor=%234FC08D)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)

# Vehicle Fleet

Simple project for learning both backend and frontend.

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

```
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

```
  GET /api/vehicles/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id of item to fetch |

#### Delete vehicle

```
  DELETE /api/vehicles/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Vehicle Id |


#### Create vehicle

```
  POST /api/vehicles
```

| Body parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | Vehicle name |
| `registration_number`      | `string` | Registration number |
| `mileage`      | `int` | Mileage |

#### Update vehicle

```
  PUT /api/vehicles
```

| Body parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Vehicle Id |
| `name`      | `string` | Vehicle name |
| `registration_number`      | `string` | Registration number |
| `mileage`      | `int` | Mileage |

  
