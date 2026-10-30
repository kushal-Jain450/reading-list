# Reading List

A clean and intuitive Laravel web application to keep track of books you want to read, are currently reading, or have finished. The application allows users to view all books, add new books with validation, edit existing books, delete books with confirmation, and filter books by their reading status without requiring user authentication.

---

## Features

- **Book Catalog:** View all tracked books displaying title, author, and reading status.
- **Add Book:** Create a book entry with validation (`title` & `author` required, max 255 chars; `status` must be `to-read`, `reading`, or `finished`). Preserves input upon validation errors.
- **Edit Book:** Update book details with the same robust validation and pre-filled current values.
- **Delete Book:** Safely delete books with an `"Are you sure?"` confirmation dialog and `@method('DELETE')` form submission.
- **Status Filter:** Instantly filter books by status (`All`, `To read`, `Reading`, `Finished`).

---

## How to Run the Application

Follow these steps to run the application locally:

### 1. Clone the repository
```bash
git clone https://github.com/kushal-Jain450/reading-list.git
cd reading-list
```

### 2. Install dependencies
```bash
composer install
```

### 3. Set up the environment file
On Linux/macOS:
```bash
cp .env.example .env
```
On Windows PowerShell:
```powershell
Copy-Item .env.example .env
```

### 4. Generate the application key
```bash
php artisan key:generate
```

### 5. Prepare the SQLite database and run migrations
Ensure the SQLite database file exists and execute the database migrations:

On Linux/macOS:
```bash
touch database/database.sqlite
php artisan migrate
```
On Windows PowerShell:
```powershell
if (!(Test-Path database/database.sqlite)) { New-Item -ItemType File -Path database/database.sqlite }
php artisan migrate
```

### 6. Start the local development server
```bash
php artisan serve
```

Open your browser and navigate to:
```
http://127.0.0.1:8000
```
(Visiting `/` automatically redirects to `/books`).

---

## AI Usage

In accordance with assignment guidelines, AI assistance was utilized as follows:
- **Project Scaffolding & Setup:** Used AI assistant to initialize the Laravel application configured with SQLite and set up Git repository tracking.
- **Database & Architecture:** Used AI to generate the `Book` Eloquent model and migration schema with custom status defaults (`to-read`).
- **Resource Routing & Controller Logic:** Used AI to draft resourceful controller methods (`index`, `create`, `store`, `edit`, `update`, `destroy`) adhering to Laravel conventions and validation rules.
- **Blade Views & Styling:** Used AI to construct accessible Blade views (`index`, `create`, `edit`) using Tailwind CSS, implementing confirmation alerts for deletion, active state highlights for status filters, and error message handling with preserved old input.
- **Testing & Verification:** Used AI to execute PHPUnit feature test cases ensuring all route responses and redirects perform accurately.
