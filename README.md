# INSTALL  
`symfony check:requirements`  
`symfony new s6ux --version="6.3.*@dev"`  
`php bin/console about`  

# SERVER  
`symfony server:start --port=9230 --no-tls -d`  
`symfony server:stop`  

# BUNDLES  
`composer require annotations`  
`composer require twig`  
`composer require --dev symfony/maker-bundle`  
`composer require symfony/asset`  

# MAKER  
`php bin/console list make`  
`php bin/console make:controller --help`  
`php bin/console make:controller BrandNewController`  
`php bin/console make:crud Product` // generate an entire CRUD from a Doctrine entity  

# Databases and the Doctrine ORM  
`composer require symfony/orm-pack`  
`composer require --dev symfony/maker-bundle`  
`php bin/console doctrine:database:create`  
`php bin/console make:entity`  
`php bin/console make:migration`  
`php bin/console doctrine:migrations:migrate`  
`php bin/console make:entity --regenerate` // generate the getter & setter methods for you  

### SQL  
`php bin/console dbal:run-sql 'SELECT * FROM product' `  

# Validation  
`composer require symfony/validator`  

# UX  
`composer require symfony/stimulus-bundle`  

### CROPPERJS  
`composer require ux symfony/ux-cropperjs`  

### CHARTJS  
`composer require symfony/ux-chartjs`  

### LazyImage  
`composer require symfony/ux-lazy-image`  

### TYPED  
`composer require symfony/ux-typed`  

### DROPZONE  
`composer require symfony/ux-dropzone`  

# YARN  
`yarn install --force`  
`yarn dev`  


# DEBUG  
`php bin/console debug:router`  
`php bin/console debug:router app_lucky_number`  
`php bin/console router:match /lucky/number/8`  
`php bin/console debug:autowiring`  

### Validation  
`php bin/console debug:validator 'App\Entity\SomeClass' `  
`php bin/console debug:validator src/Entity`  

### LINT: TEMPLATES  
`php bin/console lint:twig`  
`php bin/console lint:twig templates/email/`  
`php bin/console lint:twig templates/article/recent_list.html.twig`  

### TWIG  
`php bin/console debug:twig`  
`php bin/console debug:twig --filter=date`  
`php bin/console debug:twig @Twig/Exception/error.html.twig`  

##### The Dump Twig Utilities  
`composer require --dev symfony/debug-bundle`  
| Then, use either the {% dump %} tag or the {{ dump() }} function depending on your needs  
`{% dump articles %}` OR `{{ dump(article) }}`  


### Environment  
`php bin/console command_name` :: `APP_ENV=prod php bin/console command_name`  
`composer dump-env prod `  
| After running this command, Symfony will load the .env.local.php file to get the environment variables and will not spend time parsing the .env files.  
`php bin/console debug:dotenv`  
`php bin/console debug:container --env-vars`  
`php bin/console debug:container --parameters`  



