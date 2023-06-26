# Initial Architecture

## Description

The basic implementation technologies are to be HTML, PHP, JavaScript, MySQL. The structure of the application will initially look like this:

```c
front-end/
backend/
module1/
module1_index/
module1_specific_logs/
module2/
[...]
moduleX/
main_index.html
requirements.txt
```

We do not exclude the possibility of creating more than one web application. It is possible that, to show some vulnerabilities, we will need to implement a different type of back-end than the one on which the default application is based.

Modules will be added in the form of folders - one module corresponds to one folder. The technical documentation, which will be in the repository, will describe the process of adding new modules to the main application. Each module will have its initial theoretical description - a short note on the vulnerability that has been specially placed there and a link to an external source with more information.

Initially, we're going to allocate a separate database schema for each exercise that will require a database connection, so that this exercise doesn't suffer from the effects of the previous exercise.

The system is to fulfill a didactic function and should be practical
supplement to lectures that discuss the topic of web application security.