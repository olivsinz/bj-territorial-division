# BJ Territorial Division API

## About This Project

BJ Territorial Division API is a RESTful API built with Laravel to provide structured data about the territorial divisions of Benin (BJ). It aims to facilitate access to administrative regions, departments, communes, and other subdivisions.

## Features

-   Structured data on Benin's territorial divisions
-   RESTful API endpoints for easy integration
-   Built with Laravel for scalability and maintainability
-   Well-documented API responses

## Installation

### Prerequisites

Ensure you have the following installed:

-   PHP (>=8.2)
-   Composer

### Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/olivsinz/bj-territorial-division.git

    cd bj-territorial-api
    ```

2. Install dependencies:
    ```bash
    composer install
    ```
3. Create and configure the `.env` file:
    ```bash
    cp .env.example .env
    ```
    Update database and other environment variables accordingly.
4. Generate the application key:
    ```bash
    php artisan key:generate
    ```
5. Run database migrations:
    ```bash
    php artisan migrate
    ```
6. Start the development server:
    ```bash
    php artisan serve
    ```

## API Endpoints

### Public Endpoints

| Method | Endpoint                                 | Description                        |
| ------ | ---------------------------------------- | ---------------------------------- |
| GET    | `/api/v1/departments`                    | List all departments               |
| GET    | `/api/v1/departments/{id}/towns`         | List towns in a department         |
| GET    | `/api/v1/departments/{id}/districts`     | List districts in a department     |
| GET    | `/api/v1/departments/{id}/neighborhoods` | List neighborhoods in a department |
| GET    | `/api/v1/towns`                          | List all towns                     |
| GET    | `/api/v1/towns/{id}/districts`           | List districts in a town           |
| GET    | `/api/v1/towns/{id}/neighborhoods`       | List neighborhoods in a town       |
| GET    | `/api/v1/districts`                      | List all districts                 |
| GET    | `/api/v1/districts/{id}/neighborhoods`   | List neighborhoods in a district   |
| GET    | `/api/v1/neighborhoods`                  | List all neighborhoods             |

## Testing

Run tests using Pest PHP:

```bash
php artisan test
```

## Development Tools

This project includes several developer tools:

-   **Laravel Telescope** for debugging (disabled in production)
-   **Pest PHP** for testing
-   **PHPStan** for static analysis
-   **Laravel Pint** for code styling
-   **IDE Helper** for better IDE support
-   **Duster & TLint** for linting

Run the following commands to execute various tools:

```bash
composer pest       # Run tests
composer phpstan    # Run static analysis
composer style      # Fix code style
composer tlint      # Run TLint checks
composer duster-lint # Run Duster linting
```

## License

This project is licensed under the MIT License.

## Contact

For inquiries or support, contact [me](https://github.com/olivsinz) .
