# Shule-Quality - School Management System

**Shule-Quality** is a modern and scalable Laravel-based school management system designed to simplify and automate administrative tasks within educational institutions. This project is actively being developed to include a wide range of features for administrators, teachers, and students.

---

## 🚀 Current Features Implemented

The following features are fully implemented and working:

### 🔐 Authentication & Authorization
- **Login System** – Secure login interface using Laravel authentication.
- **Role Management** – Role-based access for `Admin` and `User` roles.
- **Middleware Protection** – Pages protected based on roles.
- **Forgot Password System** – Password reset with secure email reset link.

### 🧭 Navigation & UI Enhancements
- **Role-Based Menus** – Dynamic menu visibility based on user roles.
- **Active Menu Highlighting** – User-friendly active navigation indicators.
- **Dynamic HTML Titles** – Page titles change based on the current view.

### 👨‍🏫 Admin Management
- Add, Edit, and Delete admin users.
- Full form validation and secure data handling.
- Search and pagination support for efficient browsing.

### 🏫 School Data Management
- **Classes**
  - Create, edit, delete, and filter school classes.
- **Subjects**
  - Add, edit, delete, and filter subjects.
- **Assign Subjects to Classes**
  - Full CRUD operations with validation, filtering, and pagination.

### 👨‍🎓 Student Management
- **Create Student**
  - Store personal student data with form validation.
- **Edit & Delete Student Records**
  - Update or remove records securely.
  - Search and filter student data efficiently.

### 🔐 Profile Management
- Change password functionality for users.

---

## 🧩 Tech Stack

- **Framework**: Laravel 10
- **Backend**: PHP 8+
- **Frontend**: Blade Templates, Bootstrap (TBD)
- **Database**: MySQL
- **Authentication**: Laravel Breeze / Laravel Auth

---

## 🛠️ Installation Instructions

To get started with this project:

```bash
git clone https://github.com/yourusername/shule-quality.git
cd shule-quality
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
