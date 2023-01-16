#!/usr/bin/env bash


# doing all the prep work in case this is not a new install
echo "1/7 Setting up the environment..."
rm ./vendor -r &> /dev/null
echo "Done."


# copying the .env.exemple file to .env
echo "2/7 Copying env file..."
cp .env.example .env
echo "Done."

# Installing composer's addon
echo "3/7 Installing composer's addons..."
composer install &> /dev/null
echo "Done."


# generating the app key
echo "4/7 Generating app key"
php artisan key:generate --ansi &> /dev/null
echo "Done."


# checking database status
echo "5/7 Checking database status..."
dbstatus=$(php artisan db:show | grep "SQLSTATE\[HY000\] \[2002\]" -c)
if [[ "$dbstatus" -eq 1 ]]; then
    echo "Please start the database or check your .env file."
    exit 1
fi
echo "Database: online."
echo "Done."


# doing the base migration
echo "6/7 running migrations :"
pam=$({ echo "yes";}|php artisan migrate)
pamerrorstr="   INFO  Nothing to migrate.  "
pam=$(echo "$pam" | grep "Nothing")
if [ "$pam" = "$pamerrorstr" ]; then
    read -rep "Nothing happened, do you want to run a migrate:fresh --seed ? (y/N) " -i "N" answer
    if [ "$answer" = "y" ];then
        echo "Running migrate:fresh..."
        php artisan migrate:fresh --seed
        echo "Done."
    else
        echo "Aborting."
        exit 1
    fi
fi


# setting up backpack
# and
# creating backpack admin user
# TODO implement a check if backpack installed succeed or not
echo "7/7 installing backpack..."
{ echo "yes"; echo "admin"; echo "admin@email.com"; echo "123";  echo "no" ; echo "no" ; } | php artisan backpack:install > /dev/null
echo "Done."


echo "--INSTALLATION FINISHED--"
echo "backpack user : admin"
echo "backpack email : admin@email.com"
echo "backpack password: 123"
# echo "Done."
