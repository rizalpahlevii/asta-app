# ASTA APP APPLICATION

## Server Requirements

-   PHP Version 7.4 or above
-   Composer
-   GIT

## Installation

1. Open the terminal, navigate to your directory (htdocs or public_html).

```bash
git clone https://github.com/rizalpahlevii/asta-app.git
cd asta-app
composer install
```

2. Setting the database configuration, open .env file at project root directory

```
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```

3. Generate migration

```bash
php artisan config:cache
php artisan key:generate
php artisan migrate --seed
```
