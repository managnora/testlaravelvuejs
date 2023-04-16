## À propos de Gestion des Événements<a id="about"></a>
## Prérequis
- Ubuntu 20.04
- Git
- Docker

### Clonage du dépôt
Il faut aller sur le dépôt du projet et récupérer son lien HTTPS , puis :
```
cd ~/Projects
git clone https://github.com/managnora/testlaravelvuejs.git ~/Projects/testlaravelvuejs
```

Modifier le fichier `/etc/hosts` de son poste et y ajouter les lignes suivantes
```
#Projects
127.0.0.1     api.testlaravelvuejs.local
127.0.0.1     testlaravelvuejs.local
```
Depuis le module ``services`` de PHPStorm ou via CLI, monter l'environnement docker :
```
docker-compose up

L'application utilise une base de donnée postgres.
Si tu as suivi l'[installation](#install), ton docker vous fourni PHP, et postgres. La version de PHP doit avoir
ext-pcntl d'activée, sinon met à jour vos devStack.

### Yarn et composer
Intégrés dans la devstack, ces gestionnaires de bibliothèques sont pilotables depuis les conteneurs node et php.

#### Build les dépendances back-end (php)
Depuis le conteneur php (sur /var/www/testlaravelvuejs) ou depuis votre répertoire host (local) `~/Project/testlaravelvuejs`:
```bash
cd ~/Projects/testlaravelvuejs
cp local.env .env
composer install
```

#### Build les dépendances front-end (VueJS)
Depuis le host (local) `~/Project/testlaravelvuejs/client`:
```bash
cd ~/Projects/testlaravelvuejs/client
npm install
```
**ATTENTION : l'installation et le run ne doit pas être réalisé avec les droits `root`.**
## Import de données<a id="data"></a>
Configurer dans le .env les lignes suivantes :
```
DB_CONNECTION=pgsql
DB_HOST=pg
DB_PORT=5432
DB_DATABASE=testlaravelvuejs
DB_USERNAME=postgres
DB_PASSWORD=postgres
```
Restorer la base de données sur le localhost (se connecter en ligne de commande sur le conteneur postgresql) :
Depuis l'utilisateur `postgres`:

```
psql
> CREATE DATABASE testlaravelvuejs;

```

Lancer la commande ci-dessous pour mettre à jour la base de données

```bash
cd ~/Projects/testlaravelvuejs/
php artisan migrate
php artisan db:seed
```

Et se connecter à partir 
```
email: admin@gmail.com
mot de passe : admin2023

```
## Utilisation<a id="use"></a>
Il faut lancer le front de VueJS depuis le host (local) ```npm run serve```.

L'accès se fait directement depuis le vhost de la devStack : [testlaravelvuejs.local:8080](https://testlaravelvuejs.local:8080)
