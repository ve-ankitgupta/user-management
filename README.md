#User Management
<ul>
  <li>After login of the Superadmin:</li>
  <li>Superadmin login</li>
  <ul>
    <li>Username/Email: test@email.com</li>
    <li>Password: password</li>
  </ul>
  <li>Superadmin will be redirected to "Users" page</li>
  <ul>
    <li>On this page, all other users will be listed</li>
    <li>Create a new user</li>
    <li>Edit User</li>
    <li>Delete User</li>
  </ul>  
  <li>Newly created users can login</li>
</ul>
-----------------------------------------------------------------------------------------

We are also adding test cases. Test cases will be shared by Tomorrow morning.

-----------------------------------------------------------------------------------------

Following are the steps you can follow to run the setup

Step-1) Download "docker" and "docker-compose" in your operating system.

Step-2) Clone the project from github repository

```git clone https://github.com/ve-ankitgupta/user-management.git```

Step-3) move to "user-management" folder
```cd user-management```

Step-4) Run the below command
```sh setup.sh```

Step-5) goto user-management folder and set environment variables value
```
cd user-management
nano .env
```

DB_CONNECTION=mysql         [SET VARIABLES]
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=usermanagement
DB_USERNAME=development
DB_PASSWORD=password

Step-6) redirect to docker folder
```cd ../docker```

Step-7) Run docker-compose
```docker-compose up -d```

Step-8) goto usermanagement container and run migrate<b/>
```docker ps```
Search for usermanagement container-id<b/>
```docker exec -it [USERMANAGEMENT CONTAINER ID] /bin/bash```

Step-9) run migrateions
php artisan migrate

Step-10) open browser and goto the URL
http://localhost:8080


Note: you can see the database by using <b>Adminer</b>. or can access the Adminer on your browser by using the URL
http://localhost:8081
