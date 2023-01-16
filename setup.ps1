#!/usr/bin/env pwsh


# doing all the prep work in case this is not a new install
Write-Output "1/7 Setting up environment..."
Remove-Item -Recurse .\vendor\ >$null 2>&1
Write-Output "Done."


# copying the .env.exemple file to .env
Write-Output "2/7 Copying env file..."
Copy-Item .env.example .env
Write-Output "Done."

# setting up composer
Write-Output "3/7 Installing composer's addons..."
composer install >$null 2>&1
Write-Output "Done."


# generating the app key
Write-Output "4/7 Generating app key"
php artisan key:generate --ansi >$null 2>&1
Write-Output "Done."


# checking database status
Write-Output "5/7 Checking database status"
$dbstatus=$((php artisan db:show | findstr "SQLSTATE\[HY000\] \[2002\]").count)
if ($dbstatus -eq 1){
    Write-Output "Please start the database or check your .env file."
    EXIT 1
}
Write-Output "Database: online."
Write-Output "Done."


# doing the base migration
Write-Output "6/7 running migrations :"
$pam=$("yes`r`n"|php artisan migrate)
$pamerrorstr="   INFO  Nothing to migrate.  "
$pam=$(Write-Output $pam[1] | findstr "Nothing to migrate")
if ($pam -eq $pamerrorstr) {
    $userInput= Read-Host -Prompt "Nothing happened, do you want to run a migrate:fresh --seed ? (y/N) "
    if ($userInput -eq "y"){
        Write-Output "Running migrate:fresh..."
        php artisan migrate:fresh --seed
        Write-Output "Done."
    }
    else {
        Write-Output "Aborting"
        EXIT 1
    }}


# setting up backpack
# and
# creating backpack admin user
# TODO implement a check if backpack installed succeed or not
Write-Output "7/7 installing backpack..."
php artisan backpack:install
Write-Output "Done."
Write-Output "--INSTALLATION DONE--"
# echo "Done."
