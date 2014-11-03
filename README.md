PHP-web-app-as-a-part-of-a-system-for-ordering-drinks-in-restaurants
====================================================================

 Java web app with Android app makes system for ordering drinks in restourants. The same app is made in Java as well. Technologies: PHP, HTML, CSS, SQL


First, the user has to make login (first image). Afterward login app checks in MySQL database whether user has administrator rights or not. If user has admin rights then app will redirect him to admin part (second image) otherwise user will be redirected to user part (third image).

![Alt text](https://raw.githubusercontent.com/krunogr/PHP-web-app-as-a-part-of-a-system-for-ordering-drinks-in-restaurants/master/assets/screenshots/login.JPG "Login")

Admin site of app
User with admin right can:
 - see all users. Searching is possible by username or by type
 - add a new user (with or without admin right)
 - delete a user
 - see all orders for every user. Searching by username and by date of orders.

![Alt text](https://raw.githubusercontent.com/krunogr/PHP-web-app-as-a-part-of-a-system-for-ordering-drinks-in-restaurants/master/assets/screenshots/admin_site.JPG "Admin site of app")

User site of app
User without admin right can:
 - check a new orders. When user select a order on radio button and click Serve the order, the order goes directly to served    orders and it is not anymore in new orders.
 - see all orders with all informations (but not for another users)
 - see all articles (but not for another users). Searching by ID of article.
 - add a new article.
 - remove an article.
 - add event.
![Alt text](https://raw.githubusercontent.com/krunogr/PHP-web-app-as-a-part-of-a-system-for-ordering-drinks-in-restaurants/master/assets/screenshots/user_side.JPG "User site of app")
