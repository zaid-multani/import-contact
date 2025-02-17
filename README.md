Based on your provided database configuration, here's how the **README.md** file should look, with the correct database name mentioned:

---

# Contact Management System

This **Contact Management System** is built with **Laravel** and **Blade** templates. It allows users to manage contacts with features such as adding, editing, deleting, importing, and exporting contacts. The contacts are stored in a MySQL database, and XML import/export functionality is supported. Additionally, contacts are displayed with **pagination** for easy browsing.

## Table of Contents

- [Installation](#installation)
- [Project Overview](#project-overview)
- [Features](#features)
- [Setup](#setup)
- [Seeder](#seeder)
- [Database](#database)

---

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-directory>
```

### 2. Install Composer Dependencies

Ensure you have Composer installed. If not, install it from [here](https://getcomposer.org).

```bash
composer install
```

### 3. Set Up Your Environment

Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

Update `.env` with your database credentials.

Example `.env` configuration:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=contact_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate the Application Key

```bash
php artisan key:generate
```

### 5. Migrate the Database

```bash
php artisan migrate
```

### 6. Run Seeders (Optional)

If you want sample data, run:

```bash
php artisan db:seed --class=ContactSeeder
```

---

## Project Overview

This system allows users to:

- **Add**, **Edit**, and **Delete** contacts (name and phone number).
- **Import** contacts from an XML file.
- **Export** all contacts as an XML file.
- **Paginate** contacts for easy viewing.

---

## Features

### 1. **Contact Management**

- Add, edit, and delete contacts.
- Display contacts in a **paginated table** for easier navigation through the list.

### 2. **XML Import/Export**

- **Import** contacts from XML (name and phone number required).
- **Export** contacts as an XML file.

### 3. **Form Validation**

- Name and phone numbers must be unique.

### 4. **User Feedback**

- Displays success/error messages after actions like adding, updating, or deleting contacts.

---

## Setup

### 1. Create Database

Create a database in MySQL (or another supported DB) named `contact_db` (or update the `.env` file with a custom name).

### 2. Migrate and Seed

Run migrations and seed the database:

```bash
php artisan migrate
php artisan db:seed --class=ContactSeeder
```

### 3. Run the Application

Start the development server:

```bash
php artisan serve
```

By default, the application will be available at `http://127.0.0.1:8000`.

---

## Database

The database for this application is named **`contact_db`**. 

- The application uses a table called `contacts` to store the contact details, with fields such as `id`, `name`, and `phone_number`.
- To create this table, run the following command:

```bash
php artisan migrate
```

---

## Seeder

To populate the `contacts` table with sample data, run:

```bash
php artisan db:seed --class=ContactSeeder
```
---
