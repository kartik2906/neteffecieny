


Migration plan <br />
- backup website,  database <br />
- prepare checklist for items to be changed for  backwards compatible from 5.6 to 8.0 <br/>
	-Resources:<br />
		https://www.php.net/manual/en/migration70.incompatible.php <br />
		https://phppot.com/php/how-to-migrate-website-from-php-5-6-to-php-7/. <br />


transforming to Symphony 4.4   <br />
	- cd into neteffeciency/app <br />
	-  under src/Controller has  ’TimePriceController.php’ which  has time  and price functionality <br />
	-  make entity called Option in Entity <br />
		- made migrations with ‘php bin/console make:migration’ <br />
		- created queries in  Repository > optionRepository  <br /> 

files moved: <br />
		- file “ Main_Finance.php”  moved to  folder called  “service” under ‘app/src’ folder <br />
		- template.php is in templates folder name theme.html.twig <br />

Project bootstrap:  <br />
	-  cd into project folder’ neteffecieny/app’ <br />
	-  Execute “composer install” <br />

Database: <br />
	create ‘.env.local’ file for database config under ‘app’ folder  <br />
	Execute migration “php bin/console doctrine:migrations:migrate” <br />
	Execute 'INSERT .. ' query for data. <br />

