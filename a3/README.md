# BookVerse

BookVerse is a responsive PHP and MySQL book collection website created for COSC2446 Web Programming Assessment 2.

The website allows users to browse books stored in a database, filter books by availability, view individual book details, browse book covers in an interactive gallery, and add new books with cover image uploads.

## Live Website

https://titan.csit.rmit.edu.au/~s3967816/wp/a2/

## Features

- Database-driven book collection using MySQL
- PHP server-side processing
- Responsive Bootstrap 5 navigation and layouts
- Shared PHP header, navigation and footer includes
- Home page carousel with four static images
- Four latest database books displayed on the Home page
- Browse Books table populated from the database
- Client-side filtering by book status
- Individual database-driven book details page
- Database-driven book cover gallery
- Bootstrap gallery modal with Previous and Next navigation
- Add Book form with server-side validation
- Prepared SQL statements using procedural MySQLi
- Book cover upload with unique server-generated filenames
- Client-side image extension validation
- Live book cover preview using FileReader
- Automatic light and dark mode using `prefers-color-scheme`
- Responsive layouts for desktop, tablet and mobile

## Pages

- `index.php` — Home page with carousel and the four latest books
- `books.php` — Database-driven book collection and status filtering
- `details.php` — Displays the full details of a selected book
- `gallery.php` — Database-driven book cover gallery and modal
- `add.php` — Adds a new book and cover image to the collection

## Project Structure

```text
a2/
├── index.php
├── books.php
├── details.php
├── gallery.php
├── add.php
├── bookverse.sql
├── README.md
├── process-evidence.md
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
```

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

## Database and Coding Choices

Book data is stored in the MySQL `books` table. PHP retrieves the records and dynamically generates the Home, Browse Books, Details and Gallery content.

Database operations use procedural MySQLi and prepared statements. User-controlled output is escaped using `htmlspecialchars()` before being displayed.

The Add Book page performs server-side validation before inserting a record. Uploaded cover images are checked for an allowed file extension and stored using a unique filename generated with `uniqid()`.

Shared page elements are stored in the `includes` directory to avoid duplicating the header, navigation and footer across each page.

## JavaScript Functionality

A single JavaScript file is used for client-side functionality.

JavaScript provides:

- Book status filtering without reloading the page
- Gallery modal image and title updates
- Previous and Next gallery navigation
- Book cover extension validation
- Live book cover preview using FileReader

Gallery titles are obtained from database-generated HTML data rather than a hard-coded JavaScript book list.

## Responsive Design

Bootstrap's responsive grid system is used together with custom CSS.

The navigation collapses on smaller screens, the Featured Books section changes column layout according to screen width, and the Gallery adjusts its grid for desktop, tablet and mobile displays.

Dark mode is automatically applied using `prefers-color-scheme`.

## Testing

The website was manually tested on the RMIT Titan hosting environment.

Testing included:

- Navigation between all pages
- Responsive navigation menu
- Home page carousel
- Four latest database records on the Home page
- Browse Books database output
- Status filtering
- Book Details links and database output
- Gallery modal opening
- Gallery Previous and Next controls
- Dynamic gallery titles
- Add Book required-field validation
- Server-side validation
- Valid and invalid image extensions
- Cover image preview
- Book insertion into the Jacob 5 database
- Unique uploaded cover filenames
- Responsive layouts
- Light and dark colour schemes

## Deployment

The website is deployed on the RMIT Titan web server and uses the RMIT Jacob 5 MySQL database.

The `a2` directory uses the required web permissions and the cover upload directory is writable by the web server.

Uploaded book cover files are excluded from Git using `.gitignore`.

## Git and GitHub

Development was managed using Git and GitHub with progressive commits made throughout the project.

The repository contains the website source code, database setup script, documentation and process evidence.

GitHub Repository: https://github.com/s3967816/wp

## AI Use

ChatGPT was used as a development support tool for debugging, PHP/MySQL troubleshooting, JavaScript improvements, deployment troubleshooting and checking implementation requirements.

Meaningful AI interactions and the resulting changes and verification are documented in `process-evidence.md`.

## Known Limitations

Uploaded book covers are stored on the server filesystem while their filenames are stored in the database.

The application is designed for the RMIT course hosting environment and does not include user accounts or authentication.

## Author

Nikhil Cherukuri  
Student ID: s3967816
