## Backend Assessment using Klein PHP Router.

This project uses phpdotenv, eloquent, klein.php, and filip/whoops. 

Setup: 

1. Setup environment variables: 
```bash 
    $ cp .env.example .env
``` 
2. Edit .env to match your local mysql settings.

    ```Note the DB_ENGINE must be MyISAM if using mysql version less than 5.6 to support fulltext indexing.``` 

3. point your apache/nginx vhost at public folder.  

    Note for NGINX the most important part was having ```try_files $uri $uri/ /index.php?q=$uri&$args;``` inside the ```location/{...}``` block. 
    
    [See my nginx management tool for help setting up on linux.](https://github.com/patrickcurl/ngTool)


4. From commandline run the following commands: 
    ```bash
       $ php composer install && php vendor/bin/phinx migrate
    ```

Usage: 

Routes are in app/routes.php 

The following routes are setup: 

```
    /**
     * Index of all addresses.
     * (GET) http://back.test/addresses 
     * --> returns json of all addresses from db.
     */
    $route->respond('GET', '/addresses', [$addressController, 'index']);

    /**
     * Search addresses by field and query. I.E. 
     * (GET) http://back.test/addresses/search/field/query
     * $field can be: zipcode or name, 
     * $query is what to match against, examples: 
     */
    $route->respond('GET', '/addresses/search/[:field]/[:query]', [$addressController, 'search']);

    /**
     * Create address.
     * (POST) http://back.test/addresses 
     * all fields except address_2 are required and must meet validations. 
     * Zipcode is numeric 5-10 chars, all others are alphanumeric, spaces, hyphens, and underscores. 
     * address_2 has no validations as it's not required. 
     */
    $route->respond('POST', '/addresses', [$addressController, 'store']);
```

