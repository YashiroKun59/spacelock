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
Créer un compte gratuit sur https://postmarkapp.com avec votre adresse email pro (personnalisée) example@mon-domaine.com

Accéder à votre serveur depuis https://account.postmarkapp.com/servers

Générer votre token dans la section API Tokens > Server API tokens

Metter le token dans votre fichier .env
```
POSTMARK_TOKEN=XXX-XXXX-XXX-XXXX-XXXXXXXXX
```

Changer dans votre fichier .env la clé MAIL_MAILER
```
MAIL_MAILER=postmark
```

Changer to et from des envoi email à votre compte postmark
```
Mail::to("example@mon-domaine.com")->send(new ContactMailable( $email, $nom, $prenom, $question));
...
from: new Address('example@mon-domaine.com', 'Contact'),
...
```
