
# Laravel Fixtures

Laravel fixures is a php library for dinsert json data to table.

## Installation


```bash
composer require tinspj/fixtures
```

## Usage

Register provider on your config/app.php file.

```bash

'providers' => [
    ...,
    Tinspj\Fixtures\FixturesServiceProvider::class,
]
```

## Json file format

Create new json file and save in storage/app/fixtures.

```json

{
    "table":"users",
    "data": [
        {
            "name": "user one",
            "email":"userone@gmail.com",
            "password": "password"
        },
        {
            "name": "user two",
            "email":"usertwo@gmail.com",
            "password": "password"
        }
    ]
}

```

## php artisan commands

Register provider on your config/app.php file.

```bash
php artisan fixtures:loaddata <json_file_name>

example:
php artisan fixtures:loaddata user.json

```




## License
[MIT](https://choosealicense.com/licenses/mit/)