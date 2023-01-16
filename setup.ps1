#!/usr/bin/env pwsh
# setting up composer
Write-Output "1/4 Installing composer's addons..."
composer install >$null 2>&1
Write-Output "Done."
# copying the .env.exemple file to .env
Write-Output "2/4 Copying env file..."
Copy-Item .env.example .env
Write-Output "Done."
# doing the base migration
Write-Output "3/4 running migrations :"
$pam=$("yes`r`n"|php artisan migrate)
$pamerrorstr="   INFO  Nothing to migrate.  "
$pam=$(Write-Output $pam[1] | findstr "Nothing to migrate")
if ($pam -eq $pamerrorstr) {
    $userInput= Read-Host -Prompt "Nothing happened, do you want to run a migrate:fresh ? (y/N) "
    if ($userInput -eq "y"){
        Write-Output "Running migrate:fresh..."
        php artisan migrate:fresh
        Write-Output "Done."
    }
    else {
        Write-Output "Aborting"
        return 1
    }
}
# setting up backpack
# and
# creating backpack admin user
# TODO implement a check if backpack installed succeed or not
Write-Output "4/4 installing backpack..."
php artisan backpack:install
Write-Output "Done."
Write-Output "--INSTALLATION DONE--"
# echo "Done."
