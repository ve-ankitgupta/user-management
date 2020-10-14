# user-management
Following are the steps you should follow to run the setup

Step-1) Download the "docker" and "docker-compose" in your operating system.

Step-2) Clone the project from github repository
https://github.com/ve-ankitgupta/user-management.git

Step-3) move to "user-management" folder
cd user-management

Step-4) Run the below command
sh setup.sh

Step-5) goto user-management folder and set environment variables value
cd user-management
nano .env

```
DB_CONNECTION=mysql         [SET VARIABLES] 
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=usermanagement
DB_USERNAME=development
DB_PASSWORD=password 
```

Step-6) redirect to docker folder
cd ../docker

Step-6) Run docker-compose
docker-compose up -d

Step-7) goto usermanagement container and run migrate
docker ps
```Search for usermanagement container-id```
docker exec -it [USERMANAGEMENT CONTAINER ID] /bin/bash

Step-8) run migrateions
php artisan migrate

Step-9) open browser and goto the URL
http://localhost:8080


Note: you can see the database by using adminer. or can access the adminer on your browser by using the URL
http://localhost:8081
