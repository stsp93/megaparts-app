# Megaparts App

Megaparts application using Laravel

## Installation

To get started with the project, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/stsp93/megaparts-app
    ```


2. Navigate to the project directory

3. Install PHP dependencies using Composer:

```
composer install
```

4. Copy the .env.example file to .env and configure your database settings:

```
cp .env.example .env
```

5. Generate an application key:

```
php artisan key:generate
```

6. Migrate the database:

```
php artisan migrate
```

7. Start the project

```
php artisan serve
npm run dev
```


## User Roles and Access Permissions

#### To create a Staff account, use the following Artisan command:

``` 
php artisan create:user
```

This Laravel application features three user roles, each with its own set of access permissions:

1. **User**: Users can login/register an have access to the frontend of the application and can browse products, add them to the shopping cart.

2. **Manager**: Managers have additional privileges. They can add, update, and remove products from the system, helping to manage the product catalog.

3. **Admin**: Administrators have the highest level of access. They can access the admin panel, which provides advanced features for managing the application, including slider management




