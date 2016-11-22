# The Greenbox 
Wireframe Productview: https://wireframe.cc/Tfe9k0 

Wireframe Mobile: https://wireframe.cc/3ACC3T 

Creately Navigation View: https://creately.com/diagram/ivsgt5ny1/68eGD3FxRODQDnmq5dYJ4K8gls%3D


## About
The Greenbox is a student project created by me alone in my semester at WIT, Ireland. I'm
creating this website as a part of my Web Applications course and Server Side Scripting course.

For the front end, I'll be using Twitter Bootstrap, html, css, js and jquery. The back end
is made up by PHP and MySQL. In the future, I'll be looking at Angular and Nodejs+express to 
develop applications, but my courses requires these languages.

## What is Greenbox?
Greenbox is an imaginary company from a business idea where customers receives packages of food to their
house every week, including recipes and the exact amount of food required. The customer can chose between
different packages containing different ingredients, different sizes, prices etc. The customer will also
be able to subscribe for different amounts of time.

## User Rules

##### Not logged in
There's a basic view of the page including the homepage, news about the company, contact page, faq page,
login/register page and ofc the different food packages ... 

##### Logged in as User
The user will be taken to their homepage on login and gets extra menu buttons such as Homepage, Order ... 
They are not able to see or modify the database.

##### Logged in as Admin
Admins have a form to add/remove items from the database, and also modify users. They also get some extra
menu buttons on login. 

##### More explanation
WIthout logging in the user should be able to see the basic website including the different vegetable packages and be able to register.


After logging in the user is taken to his/her settings page. They can now add subscriptions and the amount of months they want it to last. 

If the user is an admin then the admin page should display which is opposite from the user's homepage. Here the admin can add packages, edit packages, edit user's etc.


The admin should be able to add records to the database, resulting in new products on the view products page. They can also delete and edit records.


When a user subscribes to a package the data should be stored in ‘subscription’ table

## Data to store
As of now I might go with a User *-1 Order 1-1 VegetablePackageID as you can only subscribe to one package at the same time. Then if the user wants to change the package, it can easily be updated in the DB. 


##### Users  
* userID (Primary Key)
* password 
* userRole
* Admin
* User 
* firstname 
* lastname 
* phone 
* email 
* address
* country 
* Zip

##### Subscription
* subscriptionId (Primary Key)
* userId (Foreign Key from Users)
* vegetablePackage (Foreign Key from VegetablePackages)
* subscriptionInMonths

##### VegetablePackages
* vegetablePackageId (Primary Key)
* packageSalesName
* description
* imageLink
* price
* vegetable1
* vegetable2
* vegetable3
* vegetable4
* vegetable5