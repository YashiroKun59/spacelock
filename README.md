# DO NOT SHIP

## SpaceLock
SpaceLock is an educational project made by a team of students during the year 2023.

## Warning

SpaceLock comes with no support and is not intended to be shipped.

## Windows
Pour pouvoir executer le PS1

```powershell

Set-ExecutionPolicy -ExecutionPolicy Unrestricted -Scope CurrentUser
./setup.ps1

```

## Postmark configuration
1. Créer un compte gratuit sur https://postmarkapp.com avec votre adresse email pro (personnalisée) example@mon-domaine.com

2. Accéder à votre serveur depuis https://account.postmarkapp.com/servers

3. Générer votre token dans la section API Tokens > Server API tokens

4. Metter le token dans votre fichier .env
>POSTMARK_TOKEN=XXX-XXXX-XXX-XXXX-XXXXXXXXX
5. Changer dans votre fichier .env la clé MAIL_MAILER
>MAIL_MAILER=postmark

6. Changer to et from des envoi email à votre compte postmark
>Mail::to("**example@mon-domaine.com**")->send(new ContactMailable( $email, $nom, $prenom, $question));
>...
>from: new Address('**example@mon-domaine.com**', 'Contact'),
>...
