#!/usr/bin/env pwsh
Write-Output "1/6 Setting up environment..."
Remove-Item -Recurse .\vendor\ >$null 2>&1
# copying the .env.exemple file to .env
Write-Output "2/6 Copying env file..."
Copy-Item .env.example .env
Write-Output "Done."
# setting up composer
Write-Output "3/6 Installing composer's addons..."
composer install >$null 2>&1
Write-Output "Done."
# generating the app key
Write-Output "4/6 Generating app key"
php artisan key:generate --ansi >$null 2>&1
Write-Output "Done."
# doing the base migration
Write-Output "5/6 running migrations :"
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
Write-Output "6/6 installing backpack..."
php artisan backpack:install
Write-Output "Done."
Write-Output "--INSTALLATION DONE--"
# echo "Done."
