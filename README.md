This application has two sections admin section and frontend section. 
 - Admin Section
   - Admin can manage tags
   - Admin can manage posts

Fronted section
 - Posts are showing in the home page
 - Tags are also list in the home page
 - There are single post page to display post content
 - There are tag page to list related tags posts.


Following are the instructions to setup the application on server
 - Clone the repository on your server
 - Run composer install command
 - rename .env-example file to .env
 - setup your db configuration in the .env file
 - run php artisan:migrate command (It will create required tables in your database)
 - run php artisan db:seed command(It will insert dummy data in the tables)
 - run php artisan serve command to run your application

To access admin panel use the follwoing Url and credentials - 
    Url - http://localhost:8000/login
     username - admin@admin.com
     password - password
