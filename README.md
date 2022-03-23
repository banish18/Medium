This application is build in laravel framework. It has two sections admin section and frontend section. 
 - Admin Section Feature
   - Admin can manage tags
   - Admin can manage posts

Fronted section
 - Posts are showing in the home page
 - Tags are also list in the home page
 - There are single post page to display post content
 - There are tag page to list related tags posts.


Following are the instructions to setup the application on server : - 

 - Clone / download the zip file from the repository on your server
 - Run command - composer install 
 - rename .env.example file to .env
 - setup your db configuration in the .env file
 - run command - php artisan key:generate (it will generate key)
 - run command - php artisan migrate  (It will create required tables in your database)
 - run command - php artisan db:seed (It will insert dummy data in the tables)
 - run command - php artisan serve ( to run the application )

To access admin panel use the follwoing Url and credentials - 
    Url - http://localhost:8000/login
     username - admin@admin.com
     password - password
     
 Demo - https://www.awesomescreenshot.com/video/8028226?key=c17f9768b97a681a910243063b1a78d0
