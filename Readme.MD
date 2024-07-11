# Techtrendz   

Révision des bases de PHP sans POO et sans MVC.

Application de publication d'articles par catégorie. L'administration du site est gérée par un back-office stylisée avec bootstrap.

- gestion des utilisateurs (login/register/logout)
- gestion des catégories
- gestion des articles
- téléchargement d'images
- backoffice sécurisé pour le crud des articles


## Prérequis

* docker engine;


## Installation


`git clone https://github.com/Christophe-THEVENET/PHP_TechTrendz`

`cd PHP_TechTrendz/`

`docker-compose up -d`

- créer un fichier .env a la racine de l'appli
- dans le fichier .env ajouter les variables de connexion avec vos identifiants


$$
Pour-MariaDB
$$

```python
MYSQL_ROOT_PASSWORD="xxxxx"
MYSQL_DATABASE="xxxxxx"
MYSQL_USER="xxxxxx"
MYSQL_PASSWORD="xxxxxxx"
```
$$
Pour-phpMyAdmin
$$

```python
PMA_ARBITRARY=1
PMA_HOST="xxxx"
PMA_USER="xxxxx"
PMA_PASSWORD="xxxxxx"
```
## Utilisation

url de l'application:
http://localhost:8080/

url de phpMyAdmin:
http://localhost:8899/

- importer la base de donnée (fichier bdd.sql) fourni dans 'appli.

## Ajouter un administrateur

* créer un utilisateur en selectionnant le rôle admin
