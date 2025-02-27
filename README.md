# Wardrobe Management System - Backend

This is the backend of the Wardrobe Management System, built with Laravel 11. It manages clothing items and categories, providing API endpoints for the frontend.

## Features

- User authentication (login, registration)
- CRUD operations for clothing items
- Filter and search functionality
- Category management
- API endpoints for frontend communication

## Requirements

- PHP 8.x
- Composer
- Laravel 11.x
- PostgreSQL or MySQL

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/ogjereemy/wardrobe-frontend.git
    cd wardrobe-management-backend
    ```

2. Install dependencies:

    ```bash
    composer install or 
    bundle install
    ```

3. Copy `.env.example` to `.env` and configure your environment variables (database, app URL, etc.):

    ```bash
    cp .env.example .env
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Set up the database:

    - Create a new database in your PostgreSQL or MySQL server.
    - Add the database credentials to the `.env` file.

6. Run the database migrations:

    ```bash
    php artisan migrate
    ```

7. Start the development server:

    ```bash
    php artisan serve
    ```

## API Endpoints

### Authentication
- `POST /api/login`: User login
- `POST /api/register`: User registration

### Clothing Items
- `GET /api/items`: Retrieve all clothing items
- `POST /api/items`: Add a new clothing item
- `PUT /api/items/{id}`: Update a clothing item
- `DELETE /api/items/{id}`: Delete a clothing item

### Categories
- `GET /api/categories`: Retrieve all categories

