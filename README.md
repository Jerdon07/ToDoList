# Product Inventory Management System

A lightweight inventory management app for a sari-sari store, built with native PHP and JavaScript to practice and improve web development fundamentals.

## Overview
This project helps manage product records in a simple, organized way. It includes user authentication, route protection, and full CRUD operations for inventory items.

## Features
- User registration and login
- Session-based authentication and authorization
- Product listing and search-friendly display
- Create, read, update, and delete product records
- Protected routes for authenticated users only
- Server-side validation for forms
- Custom PHP routing and MVC-inspired structure

## Tech Stack
- Native PHP
- MySQL
- Native JavaScript

## Requirements
- PHP 8+
- MySQL server
- Web server or PHP built-in server

## Setup
1. Clone the repository.
2. Create a MySQL database and update the credentials in `config.php` if needed.
3. Make sure the database name matches your setup (default is `product_db`).
4. Run the app locally:

```bash
php -S localhost:8000 -t public
```

5. Open `http://localhost:8000` in your browser.

## Usage
- Register a new account or log in.
- Manage products through the dashboard.
- Add, edit, view, or delete inventory items.

## Notes
This project is primarily a learning-focused application for practicing core web development concepts, especially PHP routing, session management, and CRUD workflows.

## License
This project is intended for educational and personal use.