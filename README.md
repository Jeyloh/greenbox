# The Greenbox 
Wireframe Productview: https://wireframe.cc/Tfe9k0 

Wireframe Mobile: https://wireframe.cc/3ACC3T 




## Actor features
WIthout logging in the user should be able to see the basic website including the different vegetable packages and be able to register.


After logging in the user is taken to his/her settings page. They can now add subscriptions and the amount of months they want it to last. 

If the user is an admin then the admin page should display which is opposite from the user's homepage. Here the admin can add packages, edit packages, edit user's etc.


The admin should be able to add records to the database, resulting in new products on the view products page. They can also delete and edit records.


When a user subscribes to a package the data should be stored in ‘subscription’ table


## Design
Add these features
A nice page for the packages with an awesome design, maybe add in bootstrap?
Set a fixed header and add useful menu tools there
When the user scrolls down, add newsletter popup



## The project proposal
Briefly describe:
the subject area of your project eg. E-commerce Shoe Store

likely types of data to be stored - What tables, and fields?
The types of users. e.g. Un-registered, registered, Admin
The functions available to each type of user. e.g. Registered User: Search products by category/sub-category, Add to shopping Cart, check-out, modify personal data (Address/ phone/email)
Subject area
The Greenbox


The webpage will be based on a business selling packages of Vegetarian food to be delivered to the door. There will be multiple menus and also focus on the front end part of things as it’s done in correlation with Web Applications course. Because of this it will also be made mobile friendly.


Rules for users
Below are the tables to be used. There will be a layout standard information layout for the page, with a requirement to sign up to actually order packages of vegetables home. As soon as you sign up with your user you will have access to a page that lets you choose different packages and subscribe to them to receive them monthly. This gives you a “Completed Order!” screen. You should be able to see and modify your remaining months, and userinfo on your userpage. 


Admins are able to browse user's and remove components from the DB. 


## Data to store
As of now I might go with a User *-1 Order 1-1 VegetablePackageID as you can only subscribe to one package at the same time. Then if the user wants to change the package, it can easily be updated in the DB. 


Users  
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

Order
* orderID (Primary Key)
* userID (Secondary Key)
* vegetablePackageID (Secondary Key)
* subscriptionPeriod

VegetablePackages
* vegetabePackageID (Primary Key)
* price
* ingredientList
