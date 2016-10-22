# Iron Fitness
Iron fitensss application build in javafx. Made for a Gym management.

This project, Customer Relationship Management, is a helping tool for such persons who are not economically eligible to have their own customer information related software. They can use our system to dynamically view all the necessary information that will surly help them to manage their relationship with their customer.

## Installion method
Follow the steps below for to install this web application to a server
 1. Get a web server that supports PHP 5 or higher and have MySQL support
 2. We must have received username, hostname, password for your mysql database
 3. Create a database with your preferred name
 4. Download the zip file from this git
 5. Change the database host, username, password and database name(the name you gave) in 4 files
   1. connect.php file from core/database
   2. database.php file from core/process
   3. Edit from the 4th line from oppertunity.php file located on the root directory
   4. Edit from the 7th line from paypal_success.php file located on the root directory
 6. Open the Database folder of this git located on the root directory. There is crm.sql file. Remane it to the name you choose   to create database on your server.
 7. Upload all the file to server root folder except Database folder.
 8. Import the sql file to your database.
 All done. Now go to www.yourdomainname/crm/ and you will see the web application running.
 You will need username and password to login as admistrator. Send me an email to www.faz13@gmail.com (my email address has www front of it), and i will verify and give you the password and username.

## Live demo
Here is a live demo of my web application
http://farewellapp.byethost7.com/crm/
