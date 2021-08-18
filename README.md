# Instructions for testing 

#basic API throttling sytem wich serves HTTP(s) request#

Clone:  git clone https://github.com/sarathprasadgp/api.git

Please add api folder to wamp www folder.

Please create database named api and import the sql from the folder sql.
#----------------------------------------------------------------------------------------------------------------
While wamp server is running you can test follwing scenarios using postman app.

GET : http://localhost/api/products

Response : https://www.screencast.com/t/ATvTOiJfhgyB

POST : http://localhost/api/products 
Form inputs keys: name,description,status

Response : https://www.screencast.com/t/Rjh5GaxeOeC

PUT : http://localhost/api/products/2

Third parameter of the api should be the id(example 2 ) of the product, which can be identified using GET request.
Form inputs keys: name,description,status

Response: https://www.screencast.com/t/adphJnjmc

DELETE : http://localhost/api/products/3

Third parameter of the api should be the id(example 3 ) of the product, which can be identified using GET request.

Response : https://www.screencast.com/t/TnYZ6AvC9W

#-------------------------------------------------------------------------------------------------------------------
Limited requests

Currently limit is set to 6 on the db , you can chnage it using api 
PUT : http://localhost/api/config/limit/4

4th parameter is used to update number of requests (example 4).
Response : https://www.screencast.com/t/KPOHZp97

If request is limited : https://www.screencast.com/t/bHbdZqF9aVBc


Unlimited requests

To remove the limit please chnage the status of limit config.

You can update it via : PUT : http://localhost/api/config/limit/4/0

5th parameter is used to update the status(1/0). For activating use 5th parameter as 1 and use 0 to inactive.

#-----------------------------------------------------------------------------------------------------------------------




