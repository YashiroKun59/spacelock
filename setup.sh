#!/usr/bin/env sh

# setting up composer
echo "1/4 Installing composer addons..."
ci="$(composer install &> /dev/null)"
echo "Done."

# copying the .env.exemple file to .env
echo "2/4 Copying env file..."
#cp .env.example .env
echo "Done."

# doing the base migration
echo "3/4 running migrations :"
pam=$(php artisan migrate)
pamerrorstr="INFO Nothing to migrate."
pam=$(echo $pam | grep "Nothing")
if [ "$pam" = "$pamerrorstr" ]; then
    read -rep "Nothing happened, do you want to run a migrate:fresh ? (y/N) " -i "N" answer
    if [ "$answer" = "y" ];then
        echo "Running migrate:fresh..."
        php artisan migrate:fresh
        echo "Done."
    else
        echo "Aborting."
        exit 1
    fi
fi

# setting up backpack
# and
# creating backpack admin user

echo "installing backpack..."
{ echo "yes"; echo "admin"; echo "admin@email.com"; echo "123";  echo "no" ; echo "no" ; } | php artisan backpack:install > /dev/null
echo "Done."
echo ""
echo ""
echo "backpack user : admin"
echo "backpack email : admin@email.com"
echo "backpack password: 123"

# echo "Done."
