# Database intergration 

From Database Integration Handout #1:

API  
(from php.net) 
An Application Programming Interface, or API, defines the classes, methods, functions and variables that your application will need to call in order to carry out its desired task. In the case of PHP applications that need to communicate with databases the necessary APIs are usually exposed via PHP extensions. APIs can be procedural or object-oriented. With the object-oriented API you instantiate classes and then call methods on the resulting objects. Of the two the latter is usually the preferred interface, as it is more modern and leads to better organized code. 

Connecting Php and MySQL  
There are two main API options to connect to mysql:
1.	Mysqli extension. The preferred extension because of its object oriented interface, support for prepared statements, multiple statements and transactions. We will be using this extension.
2.	Php Data Objects (PDO) provides a consistent API for the PHP application regardless of the type of database server. It doesn't allow you to use all of the advanced features that are available in the latest versions of MySQL server. 
