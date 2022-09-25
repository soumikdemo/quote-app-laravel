## Kayne Quote App

> Live preview:  
> [pending](http://kanye.infinityfreeapp.com/)

#### Features implemented
- A web page that shows 5 random Kayne West quotes
- Refresh quotes
- Authentication for the page done with a password
- An API route available to fetch 5 random Kayne West quotes. http://127.0.0.1:8000/api
- The API route is secured with a token

#### Steps to clone and setup
- clone the repository
- copy .env.example to .env
- run composer install
- run php artisan key:generate
- create a mysql db named 'quote-app'. [use root as a username with no password]
- run php artisan migrate
- run php artisan serve and go to http://127.0.0.1:8000/setup to generate token & save it. Now go to http://127.0.0.1:8000/. Login using 'admin' as a password. You are good to go.

**You need to add bearer token to your api client like postman to access the api route. The token can be found here:** http://127.0.0.1:8000/setup