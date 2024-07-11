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


```markdown
git clone https://github.com/Christophe-THEVENET/PHP_TechTrendz.git
```

```markdown
cd PHP_TechTrendz/
```

#### Créer un fichier .env a la racine de l'appli
- dans le fichier .env ajouter vos identifiants de connexion a la place de xxxxxxxxx

$$
Pour-MariaDB
$$

```python
MYSQL_ROOT_PASSWORD="root"
MYSQL_DATABASE="techtrendz_db"
MYSQL_USER="xxxxxx"
MYSQL_PASSWORD="xxxxxxx"
```
$$
Pour-phpMyAdmin
$$

```python
PMA_ARBITRARY=1
PMA_HOST="db"
PMA_USER="xxxxx"
PMA_PASSWORD="xxxxxx"
```

#### Créer les conteneurs docker


`docker-compose up -d`
## Utilisation

url de l'application:
http://localhost:8080/

url de phpMyAdmin:
http://localhost:8899/

- importer la base de donnée (fichier bdd.sql) fourni dans 'appli.

## Ajouter un administrateur

* créer un utilisateur en selectionnant le rôle admin
