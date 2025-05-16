# attendence_tracker_ogilvy

Attendance Tracker System using Laravel (PHP) and JavaScript

## Requirements

-   PHP >= 8.0
-   Composer
-   MySQL or MariaDB
-   Node.js and npm (for frontend assets)
-   Laravel 10.x (or compatible version)

## Installation

1. **Clone the repository**

```bash
git clone https://github.com/GHLakshani/attendence_tracker_ogilvy.git
cd attendence_tracker_ogilvy

composer install

cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ogilvy_db
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate

php artisan migrate --seed

php artisan serve

#url
#http://127.0.0.1:8000
#http://127.0.0.1:8000/attendance
```
