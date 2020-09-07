<p align="center"><img src="VOX-POPULI.png" width="250"></p>

# About Vox-Populi
Vox-Populi is an communal life managing system. Its main purpose is to allow citizens of a town to share their ideas with their community and city hall members. This, in order to allow each person to contribute actively into making their living place as great as they can dream it.
Vox-Populi offers a bunch of possibilities such as :

- Submit an umlimited number of ideas 
- React to others ideas (Like & Dislike)
- Vote for or against an Idea
- Comment an Idea 
- Most liked ideas can be turned into projects to realise by the city hall
- Follow evolution of a project and each citizens can make comment to assure the final result fit with the real needs of people
- City Hall can make polls to require citizens point of view 

and many more awesome features to come ...

# To get started  
Vox-Populi's code is essentially written in PHP using the LARAVEL framework. As database system, we use MySQL.

## Prerequisites
- [COMPOSER](https://getcomposer.org) 

You may install LARAVEL framework from composer by running ``` composer global require laravel/installer ``` 
- [LARAVEL](https://laravel.com/docs/7.x/installation) (Please, check this link for more detailed explanations on installing the LARAVEL framework)

- [Node.js](https://nodejs.org/en/)
- [XAMPP](https://www.apachefriends.org/fr/index.html) (be carefull to choose the good version depending on your OS)
- [VONAGE](https://dashboard.nexmo.com/sign-up) : Create an account in order to use sms verification 

---

### Configure ```.env``` file 
```
APP_NAME=VOX-POPULI


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=populi
DB_USERNAME=root
DB_PASSWORD=

NEXMO_KEY = (find in your VONAGE dashboard, Getting Started section)
NEXMO_SECRET = (find in your VONAGE dashboard, Getting Started section)
```
**Create a MySQL database called ``populi``**

**Run all the migration with** 
``php artisan migrate``

**Once you're all set, from your locally forked directory, run** 
```
php artisan serve
```
