## Backend Assessment using Klein PHP Router.

This project uses phpdotenv, eloquent, klein.php, and filip/whoops. 

Setup: 

1. cp .env.example .env
2. point your apache/nginx vhost at public folder.  
    Note for NGINX the most important part was having ```try_files $uri $uri/ /index.php?q=$uri&$args;``` inside the ```location/{...}``` block. 

    [See my nginx management tool for help setting up on linux.](https://github.com/patrickcurl/ngTool)
