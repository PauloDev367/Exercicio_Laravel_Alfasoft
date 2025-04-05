# 📇 Contact Management Web Application

A simple Laravel-based web application to manage contacts. This application allows users to log in, view a list of contacts, add new contacts, and view or edit existing contact details.

## 🚀 Technologies Used

- **PHP**: 8.1  
- **Laravel**: 10

## 📦 Project Setup

To run the application locally, follow these steps:

1. **Clone the repository** (if needed):  
   ```bash
   git clone https://github.com/PauloDev367/Exercicio_Laravel_Alfasoft
   cd <folder>
   ```

2. **Install dependencies**:  
   ```bash
   composer install
   composer update
   composer dump-autoload
   ```

3. **Copy the `.env` file and generate the application key**:  
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure your database** in the `.env` file and run migrations:  
   ```bash
   php artisan migrate
   ```

5. **Serve the application**:  
   ```bash
   php artisan serve
   ```

Once the server is running, you can access the app at [http://localhost:8000](http://localhost:8000).

---

## 🔐 Login Credentials

To access the application, use the following test credentials:

- **Email**: `email@email.com`  
- **Password**: `senha123`

---

## 🧭 Pages Included

1. **Login Page** – Access-protected page for authentication.  
2. **Index Page** – Displays a list of existing contacts.  
3. **Add Contact Page** – A form to create a new contact.  
4. **Contact Details Page** – View, update, or delete a contact. This is a dedicated page (not a modal).

---

## 🧪 Running Tests

To run the test suite, execute:

```bash
php artisan test
```

### 🧠 Tip: Use an In-Memory SQLite Database for Testing

To ensure tests run quickly and without altering your development database, it's recommended to switch to an **in-memory SQLite database** while testing. Update your `.env` file with the following settings:

```env
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
```

Alternatively, you can create a separate `.env.testing` file:

```env
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
```

Laravel will automatically use this when running `php artisan test`.

---

## 📌 Notes

- Ensure the database is correctly configured before running migrations.
- All core features (CRUD for contacts) are implemented and tested.

---

## Conventional Commits
| Type     | Emoji                 | code                    |
|:---------|:----------------------|:------------------------|
| feat     | :sparkles:            | `:sparkles:`            |
| fix      | :bug:                 | `:bug:`                 |
| docs     | :books:               | `:books:`               |
| style    | :gem:                 | `:gem:`                 |
| refactor | :hammer:              | `:hammer:`              |
| test     | :rotating_light:      | `:rotating_light:`      |
| config   | :gear:                | `:gear:`                |