#!/bin/bash

# Configurable variables
MYSQL_ROOT_USER="root"
MYSQL_ROOT_PASSWORD="rootpassword"
MYSQL_HOST="mysql"  # This should match your docker-compose mysql service name
MYSQL_PORT="3306"

# User to be created for the application
APP_DB_USER="stockuser"
APP_DB_PASSWORD="stockpassword"
APP_DB_NAME="stockdb"

# Wait until MySQL is ready
echo "Waiting for MySQL to be ready..."
until mysql -h $MYSQL_HOST -P $MYSQL_PORT -u$MYSQL_ROOT_USER -p$MYSQL_ROOT_PASSWORD -e "SELECT 1" &> /dev/null
do
  sleep 2
done

echo "MySQL is up. Proceeding with database migration..."

# Execute SQL commands
mysql -h $MYSQL_HOST -P $MYSQL_PORT -u$MYSQL_ROOT_USER -p$MYSQL_ROOT_PASSWORD <<MYSQL_SCRIPT
CREATE DATABASE IF NOT EXISTS $APP_DB_NAME;
CREATE USER IF NOT EXISTS '$APP_DB_USER'@'%' IDENTIFIED BY '$APP_DB_PASSWORD';
GRANT ALL PRIVILEGES ON $APP_DB_NAME.* TO '$APP_DB_USER'@'%';
FLUSH PRIVILEGES;

USE $APP_DB_NAME;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100),
  is_deleted TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
MYSQL_SCRIPT

echo "Database migration completed successfully."

# Now seed initial app user via PHP
php /var/www/html/frontend/seed.php
