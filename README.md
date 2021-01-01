#Full registration system using PHP

##Technologies/Tools used
* HTML/CSS - for structuring pages
* Bootstrap - for give structure and style of the pages 
* PHP - to implement server side business logic, validation, etc.
* JSON - for database

##How to use:

If file uploading is not enabled, go to you ```php.ini``` file, find ```file_uploads``` and enter ```On```, it should be like:
```
...
file_uploads = On
...
```

###Using PHP itself

1. ```git clone https://github.com/TheDevz/registration-system-tutorial```
2. ```php -S localhost:8000```
3. Go to browser at ```http://localhost:8000```

###Using XAMPP

1. Clone repository to htdocs
	```git clone https://github.com/TheDevz/registration-system-tutorial```
	so that you see ```registration-system-tutorial``` folder there
2. Run(Press "Start") XAMPP web-server(apache)
3. Go to browser at ```http://localhost/registration-system-tutorial```