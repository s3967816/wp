# BookVerse

BookVerse is a responsive PHP and MySQL book collection website developed for COSC2446 Web Programming Assessment 3.

The website allows visitors to browse, search and view books stored in a database. Registered users can log in, add books, manage their own listings and view books belonging to individual sellers.

## Live Website

A3 deployment: To be added after deployment to the RMIT hosting environment.

## Features

- Database-driven book collection using MySQL
- Responsive Bootstrap 5 navigation and layouts
- Shared PHP header, navigation and footer includes
- Home page carousel and four latest database books
- Browse Books table with client-side status filtering
- Individual book details pages
- Database-driven book cover gallery with Bootstrap modal
- Search books by title, author and description
- User registration with password hashing
- User login using password verification and PHP sessions
- Automatic login after successful registration
- User logout
- Add Book form with server-side validation and image uploads
- Edit and delete functionality restricted to the book's owner
- Seller pages displaying books belonging to a selected user
- Prepared SQL statements using procedural MySQLi
- Escaped database output using `htmlspecialchars()`
- Session-based flash messages
- Unique server-generated filenames for uploaded cover images
- JavaScript image validation and live image preview
- Responsive desktop, tablet and mobile layouts

## Pages

- `index.php` — Home page with carousel and latest books
- `books.php` — Book collection and status filtering
- `details.php` — Full details of an individual book
- `gallery.php` — Book cover gallery and image modal
- `search.php` — Search books by title, author or description
- `seller.php` — Displays books belonging to a seller
- `add.php` — Adds a new book for the logged-in user
- `edit.php` — Allows a book's owner to edit their listing
- `delete.php` — Processes owner-authorised book deletion
- `register.php` — Creates a new user account
- `login.php` — Authenticates users
- `logout.php` — Ends the current user session

## Project Structure

\`\`\`text
a3/
├── index.php
├── books.php
├── details.php
├── gallery.php
├── search.php
├── seller.php
├── add.php
├── edit.php
├── delete.php
├── register.php
├── login.php
├── logout.php
├── bookverse.sql
├── README.md
├── process-evidence.md
├── .gitignore
├── favicon.svg
│
├── includes/
│   ├── db_connect.inc
│   ├── header.inc
│   ├── nav.inc
│   └── footer.inc
│
└── assets/
    ├── css/
    │   └── style.css
    ├── js/
    │   └── scripts.js
    └── images/
        └── covers/
\`\`\`

## Technologies Used

- PHP
- MySQL
- Procedural MySQLi
- HTML5
- CSS3
- JavaScript
- Bootstrap 5.3.3
- Google Fonts
- Google Material Icons
- Git and GitHub

## Database and Security

Book and user information is stored in the MySQL database using the supplied BookVerse database schema.

Database operations use procedural MySQLi and prepared statements. User-controlled output is escaped using `htmlspecialchars()` before being displayed.

Passwords are stored using PHP's `password_hash()` function and checked using `password_verify()`.

PHP sessions are used to maintain login status. Access to adding, editing and deleting books is restricted to authenticated users, with editing and deletion limited to the owner of each book.

Uploaded cover images are checked on the server and stored using unique server-generated filenames.

## JavaScript Functionality

Client-side functionality is maintained in `assets/js/scripts.js`.

JavaScript provides:

- Book status filtering without reloading the page
- Gallery image and title updates
- Previous and Next gallery navigation
- Book cover extension validation
- Live book cover preview using FileReader

## Responsive Design

Bootstrap 5 and custom CSS are used to provide responsive layouts for desktop, tablet and mobile screens.

The navigation adapts to smaller screens, and the book collection and gallery layouts adjust to different screen sizes.

The website also includes light and dark colour schemes.

## Testing

Testing will be documented as A3 functionality is verified.

Testing includes database operations, user registration and login, ownership restrictions, book creation and editing, deletion, searching, gallery functionality and responsive layouts.

## Deployment

The application is designed to use a local MySQL database during development and the RMIT Jacob 5 MySQL database when deployed.

Deployment details and configuration will be updated after the A3 application has been deployed and tested.

## Git and GitHub

Development is managed using Git and GitHub with progressive commits throughout the project.

GitHub Repository: https://github.com/s3967816/wp

## AI Use

ChatGPT was used as a development support tool for debugging, PHP and MySQL troubleshooting, reviewing implementation requirements and improving code.

Relevant AI interactions, accepted changes and verification are documented in `process-evidence.md`.

## Author

Nikhil Cherukuri  
Student ID: s3967816
