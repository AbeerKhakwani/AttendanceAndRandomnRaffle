# Epifoodus
### Group Project
## by Patrick, Jill, Abeer, Erica, Kyle, Evan, Tanner
### Date: March 30, 2015
#### Description

This app helps users make a decision about what to eat for lunch.

1. A user decides they're hungry and the app returns two nearby options.

2. The user can choose an option and it will show a page with all of that restaurant's info (name, location, price, hours, cuisine, veggie options)

3. The user can also create an account in order to save their preferences & liked restaurants.


#### Setup instructions
1. Clone this git repository
2. Set your localhost root folder to ~/epifoodus/web/
3. Ensure PHP server is running.
4. Start Postgres and import epifoodus.sql database into a new database epifoodus
5. Do the same for the test database: epifoodus_test.sql
6. Use Composer to install required dependencies in the composer.json file
7. Start the web app by pointing your browser to the root (http://localhost:8000/)


#### PSQL commands
CREATE DATABASE epifoodus;
\c epifoodus;
CREATE TABLE restaurants (id serial PRIMARY KEY, name varchar, address varchar, phone varchar, price int, vegie int, opentime int, closetime int);
CREATE TABLE prices (id serial PRIMARY KEY, level int);
CREATE TABLE cuisines (id serial PRIMARY KEY, type varchar);
CREATE TABLE cuisines_restaurants (id serial PRIMARY KEY, cuisine_id int, restaurant_id int);
CREATE TABLE users (id serial PRIMARY KEY, username varchar, password varchar,vegie int,admin int);
CREATE TABLE likes (id serial PRIMARY KEY, answer int, restaurant_id int, user_id int);
CREATE DATABASE epifoodus_test WITH TEMPLATE epifoodus;

#### Copyright © 2015, Epifoodus, Inc.

#### License: [MIT](https://github.com/twbs/bootstrap/blob/master/LICENSE)  
