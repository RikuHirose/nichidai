**NEED TO UPDATE!!**

# App Name

## Descriptions
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus est, fermentum at sapien eu, vulputate porttitor velit. Donec blandit urna quis efficitur tincidunt. Ut efficitur nisl ut libero scelerisque tincidunt. Fusce rhoncus ligula sed massa fringilla consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed cursus ipsum sed tellus finibus aliquam tempus interdum sem. Praesent consequat feugiat elit quis fermentum. Nunc euismod elit sit amet neque ornare tempus. Curabitur finibus, justo sit amet blandit imperdiet, magna ex porta nisl, non condimentum nisl libero eget nisi. Nunc at pharetra dui. Aliquam dapibus cursus sollicitudin. In laoreet tincidunt metus at ultrices. Morbi eu ultrices felis. Mauris sodales porta lorem a elementum.

## How To Set Up This App

## How To Start Your Project

First, you can clone this repository.

```
$ mkdir [PROJECT WORKSPACE]
$ git clone [REPOSITORY URL] [PROJECT WORKSPACE]
$ cd [PROJECT WORKSPACE]
$ cp -p .env.example .env
$ vi .env
$ composer install
$ npm install
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
```

## Frontend build
```
$ npm run prod
```

## Use Generators

On this boilerplate, I added many generators

Use `rocket:make:model` instead of `make:model` and use `rocket:make:repository`, `rocket:make:service`, `rocket:make:helper` to create repositories, services, helpers.
And `rocket:make:admin:crud` to create admin crud.

The process for setting up the base structure will be following.

You can use these commands for development.
```
 rocket
  rocket:make:admin:crud        Create a admin crud for database table
  rocket:make:helper            Create a new helper class
  rocket:make:migration:alter   Create a migration for create table
  rocket:make:migration:create  Create a migration for create table
  rocket:make:model             Create a new model class
  rocket:make:repository        Create a new repository class
  rocket:make:service           Create a new service class
```

1. You can create migration with `make:migration` and create the tables
2. Create model with `rocket:make:model`
3. Create repository with `rocket:make:repository`
4. Create Admin CRUD with `make:admin-crud`
5. Create services and helpers with `rocket:make:service` and `rocket:make:helper` if needed.

These generators create test code also. You need to add more tests on these files.
