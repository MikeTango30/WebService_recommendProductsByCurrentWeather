## Task 
Create a service, which returns product recommendations depending on current weather.

#### Usage: 
* GET host.com/api/products/recommended/:city
* {city} - any LT city without LT characters. Use dashes instead of spaces.


#### Deployed at:
https://recommended-products.herokuapp.com/api/products/recommended/palanga

#### Tech:
* PHP, Laravel
* MySql

#### Local setup with Docker:
##### in project root execute scripts/start.sh:
* It will build, (re)creates, start containers; 
* Copy and config .env file;
* Generate App key
* Run migrations and seed db

##### in project root execute scripts/stop.sh: 
* It will stop and remove containers and app network

