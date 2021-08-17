Migration plan
- backup website,  database 
- prepare checklist for items to be changed for  backwards compatible from 5.6 to 8.0
	-Resources:
		https://www.php.net/manual/en/migration70.incompatible.php
		https://phppot.com/php/how-to-migrate-website-from-php-5-6-to-php-7/ 


		
transforming to Symphony 4.4   
	-  create project - ‘symfony new app --full’ 
	- cd into neteffeciency
	-   folder controller has  ’TimePriceController.php’  has time  and price functionality
	 -  make an entity object called ‘option’
	-  make entity called Option in Entity
		- make migrations with ‘php bin/console make:migration’
		- create queries in  Repository > optionRepository  

files moved
		- file “ Main_Finance.php”  moved to  folder called  “service” under ‘app/src’ folder
		- template.php is in templates folder name theme.html.twig

Project bootstrap:
	-  to use symphony 4.4 version  —  use php 7.1 or higher  — php 8.0 not compatible with symphony 4.4
	-  cd into project folder’ neteffecieny/app’
	-  Execute “composer install”

Database:
	create ‘.env.local’ file for database config under ‘app’ folder  
	Execute migration “php bin/console doctrine:migrations:migrate” 
	insert values in the table you created
