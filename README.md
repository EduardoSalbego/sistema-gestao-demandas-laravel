# Demand Management System (Laravel 10)

[![Laravel 10](https://img.shields.io/badge/Framework-Laravel%2010-red)](https://laravel.com)
[![PHP 8.1+](https://img.shields.io/badge/Language-PHP%208.1%2B-blue)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

A robust web application developed as a **technical onboarding challenge** to manage corporate demands and tasks. This system implements full CRUD operations, advanced security layers, and a data-driven dashboard.

---

## Technologies & Architecture

* **Backend:** PHP 8.1+ with **Laravel 10** Framework.
* **Database:** SQLite (Relational).
* **Frontend:** Blade Templates styled with **AdminLTE 3** (Bootstrap 4).
* **Architecture:** MVC (Model-View-Controller) with a focus on Clean Code and maintainability.

---

## Key Features

### 1. Business Intelligence Dashboard
* Real-time visualization of **KPIs** (Key Performance Indicators).
* Strategic counters for Total, Pending, and Urgent demands.
* Quick-access shortcuts for streamlined workflow.

### 2. Advanced Demand Management (CRUD)
* **Dynamic Listing:** Paginated views with status-based visual identifiers.
* **Optimized Filtering:** Intelligent status filtering without full page reloads.
* **Validation:** Rigorous server-side validation for data integrity (date logic, string constraints).
* **Data Persistence:** Implementation of `SoftDeletes` to maintain historical logs and prevent accidental data loss.

### 3. Enterprise-Grade Security
* **Authentication:** Multi-layer route protection via Laravel Middleware.
* **Fine-Grained Authorization (Policies):** Native Laravel Policies ensure users can only access, edit, or delete their own data (Resource-level security).

---

## Installation & Setup

Siga os passos abaixo para rodar o projeto na sua máquina.

### 1. Prerequisites
* PHP >= 8.1
* Composer
* Git / Node.js & NPM

### 2. Clone and Configure

```bash
# Clone the repository
git clone https://github.com/EduardoSalbego/sistema-gestao-demandas-laravel.git

# Enter the project directory
cd demand-management

# Install PHP dependencies
composer install

# Install Frontend dependencies and compile assets
npm install && npm run build

# Setup environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Database Initialization (SQLite)

```bash
# Create the SQLite file (Linux/Mac)
touch database/database.sqlite

# Create the SQLite file (Windows)
New-Item database/database.sqlite

# Run migrations
php artisan migrate
```

### 4. Seed Data

Execute migration to load tables.

```bash
# Create tables
php artisan migrate

# (Optional) After registering, run to generate data:
php artisan db:seed
```

### 5. Running project

```bash
php artisan serve
```

Acess http://localhost:8000

### Developed by
**Eduardo Salbego** Software Engineering Student | 8th Semester @ UNIPAMPA  _Currently focusing on Full-Stack Development and AI_
