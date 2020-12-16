# pizzaman

## install 

* install docker and docker-compose
* clone that repo
* stop any 80 port activity (http server) on your host
* run the containers with terminal command ```docker-compose up```
* install php dependencies with command ```docker-compose run php composer install```
* Run migrations with command ```docker-compose run php bin/console doctrine:migrations:migrate```
* Add fixtures to work with sample data ```docker-compose run php bin/console doctrine:fixtures:load```

## run

* run the containers with terminal command ```docker-compose up```
* got to https://localhost:8443/ and accept https self-certified ssl certificate
  => This is the api server with documentation of what can be done with API
* go to http://localhost:444
  => this is a begining of react interface with CRUD features on Ingredients and Pizzas

## working with specs

The specs are written in php, and can be run to test them
* the specs are located in ```api/spec```
* run the terminal command ```docker-compose run php vendor/bin/phpspec run```

## architecture

The app is separated in two layers :
* Domain layer, that holds all business logic
* Application layer, that act like a glue between framework and the domain

## NOT DONE, BUT SHOULD BE NEXT STEPS

* Add validation on entity properties
* Add cost and price of pizza in the serialisation of the pizza (should work as defined in config, but … not yet ;) )
