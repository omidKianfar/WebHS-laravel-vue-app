  # App Name
  WebHS ( abs: Web Home Studio )
  
  # Description
  WebHS is a learning web app, designed with laravel and vue.js framworks, jquery and bootstrap v4

  Its include 3 pages: 
  1. Welcome
  2. Products
  3. Courses

  Also it has include:
  1. Admin Panel 
  2. Profile page
 
  # Usage technologies
  1. HTML
  2. CSS
  4. bootstrap v4
  5. Jquery
  6. Laravel
     1. Laravel Blade 
  7. Vue.js
    
  # Install
  1. Download project from:

    https://github.com/omidKianfar/WebHS-laravel-vue-app.git
     
      
  2. Install
    
    Wamp server or Xampp server with php v 7.2.5 until php v 8.0
      
    composer      

  3. Install dependencies
	

    1. npm install

    2. make a .env file same .env.example in webhs app
    
    3. composer install
    
    4. make a factories folder in database folder

    5. composer update

    6. make a database by name webhs in mysql
    
    7. php artisan key:generate
    
    8. php artisan config:cache
    
    9. php artisan migrate

  4. Run project

    1. npm run dev
      
    2. php artisan serve


