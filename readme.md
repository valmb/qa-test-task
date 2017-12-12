# Test task

This task purpose it to give us a vision of how you approach things. Consider it as real task and as you work on real big project.
It is very important not only how carefully you will test app, but how you interact with other team members while doing it, and how useful will be the result of your testing for QA process.
 

1. Make project running on your local computer
2. Test it doing your best. Remember, app will be deployed to production after your testing, and it should be perfect there.         
    - Business logic rule 1 - basket never can give more than 1 apple per minute
    - Business logic rule 2 - user never can have apples with both odd and even ids
3. Provide result as checklist or whatever tool you prefer document.
4. *Optional*  Create test automation with Selenium or whatever tool you like to use
5. Don't hesitate to contact us if any questions. Use email or skype provided
6. Modify and create other docs as result of you work. Could be this doc project setup process spec, project features spec doc, release notes.


# What can help you to make project running

[Laravel docs](https://laravel.com/docs/5.4/installation)

Main steps: create mysql db, fill its credentials in .env file and run commands below. If you have troubles, dont hesitate to contact us, we will help.

Commands to make project running (run in console, project root dir): 
```
php artisan migrate
php artisan db:seed    
```