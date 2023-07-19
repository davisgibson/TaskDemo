#Hello!

##Here is a list of instructions to get this site running.

##1. run `composer install` from project root

##2. set up development enviroment (I'm on windows unfortunately, so I use Sail/Docker)
	This should be a pretty standard laravel setup, but if you have any issues,
	more info can be found here: https://laravel.com/docs/10.x/installation

##3. open .env, configure database and app_url variables to match your development enviroment.

##4. if APP_KEY is not set, run `php artisan key:generate`

##4. run `php artisan migrate` from project root

##5. The app should be visible in your browser.





If you have any questions/issues, please email me at gibsonscottdavis@gmail.com

I labelled my comments with a `*note*` (including asterisks) to make them searchable.



###TODO:
 - make the priority slider in tasks/create look better (or delete it altogether, it may be more labor than its worth)
 - perhaps use observers to handle re-prioritization when a new task is stored.
 - landing page with projects / global task list
 - middleware to require an account
 - put this sucker on a laravel forge server with its own domain




Thanks for checking out my code!

--Davis Gibson