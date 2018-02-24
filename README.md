## Backend Assessment using Klein PHP Router.

This project uses phpdotenv, eloquent, klein.php, and filip/whoops. 

Setup: 

1. Setup environment variables: 
```bash 
    $ cp .env.example .env
``` 
2. Edit .env. 

    ```Note the DB_ENGINE must be MyISAM if using mysql version less than 5.6 to support fulltext indexing.``` 

2. point your apache/nginx vhost at public folder.  

    Note for NGINX the most important part was having ```try_files $uri $uri/ /index.php?q=$uri&$args;``` inside the ```location/{...}``` block. 
    [See my nginx management tool for help setting up on linux.](https://github.com/patrickcurl/ngTool)

3. Setup mysql DB matching credentials put in .env. To change custom settings like colation or charset see boot/db.php

4. From commandline run the following commands: 
    ```bash
       $ php composer install && php vendor/bin/phinx migrate
    ```