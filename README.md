# Laravel Order Management Dashboard
=====================================

## Project Overview
-------------------

This Laravel project provides a comprehensive order management dashboard, enabling users to upload JSON files containing order details. The system parses and stores the JSON data in a database, displaying orders in a table on the dashboard. Additionally, the project features PDF invoice generation with support for multiple languages, including English, French, and Arabic.

## Getting Started
-------------------

### Prerequisites

Before proceeding, ensure you have the following installed:

* **PHP** (version 7.4 or higher)
* **Composer**
* **Laravel** (version 8.x or higher)
* **MySQL** or another supported database

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/taimoorali-code/invoice-pdf.git
    cd invoice-pdf
    ```

2. Install Dependencies:
    ```bash
    composer install
    ```

### Set Up Environment
```bash
cp .env.example .env
php artisan key:generate
```

### Configure Database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Run Migrations
```bash

php artisan migrate
```
### Start the Development Server
```bash

php artisan serve
```
## Dashboard

The dashboard allows users to:
- Upload JSON files with order details, which are then stored in the database
- View orders in a table
- Generate PDF invoices with support for multiple languages
- Change the language through the dropdown menu in the upper right corner

## Dashboard Features
- **Order Table:** Displays a list of uploaded orders, including order details and status.
- **JSON File Upload:** Allows users to upload JSON files containing order details.
- **PDF Invoice Generation:** Generates PDF invoices for each order, with support for multiple languages.
- **Language Switcher:** Enables users to switch between languages, including English, French, and Arabic.

## Technical Details
- The project uses Laravel's Eloquent ORM for database interactions.
- Migrations and model files are provided for storing and retrieving data.
- The `barryvdh/laravel-dompdf` library is used for PDF generation.
- The invoice template is dynamic, with a sample design provided.


 for pdf the library is used : barryvdh/laravel-dompdf

 template is looks something like given sample little bit sizing but the functionalty id dynamic. 

 also you can look the invoice in the web through view invoice button and download the invocie throguh download button and Invoice name saved through  the orderId 

![Dashboard Image](/images/dashboard.png)

