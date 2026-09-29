# BookVerse


BookVerse is a responsive book collection website created for the Web Programming assessment. The website allows users to browse books, filter books by availability, view book covers in an interactive gallery, and complete a form to add a new book.


## Features


- Responsive navigation across all pages
- Automatic light and dark mode using prefers-color-scheme
- Bootstrap carousel on the Home page
- Featured book cards with price and availability
- Book table with availability filtering
- Interactive book cover gallery
- Gallery modal with Previous and Next navigation
- Add Book form with required-field validation
- Book cover image file validation
- Live book cover image preview
- Responsive layouts for different screen sizes


## Pages


- index.html — Home page with carousel and featured books
- books.html — Book collection and status filtering
- gallery.html — Interactive book cover gallery
- add.html — Form for adding a new book


## Technologies Used


- HTML5
- CSS3
- JavaScript
- Bootstrap 5.3.3
- Google Fonts
- Google Material Icons
- Git and GitHub


## Project Structure


text
BookVerse/
│
├── index.html
├── books.html
├── gallery.html
├── add.html
├── README.md
├── process-evidence.md
│
└── assets/
    ├── css/
    │   └── style.css
    │
    ├── js/
    │   └── scripts.js
    │
    └── images/
        └── covers/
JavaScript Functionality

JavaScript is used to provide interactive functionality throughout the website.

The Books page allows users to filter the book table by availability status.

The Gallery page allows users to select a book cover and display it in a modal. Previous and Next controls allow navigation between gallery images.

The Add Book page validates uploaded image file extensions and uses FileReader to display a live preview of the selected book cover.

Responsive Design

The website uses Bootstrap's responsive grid system together with custom CSS media queries. The layout adjusts for desktop, tablet and mobile screen sizes.

Dark mode is automatically applied using:

@media (prefers-color-scheme: dark)
Testing

The website was manually tested in the browser at different viewport sizes.

Testing included:

Navigation links between all four pages
Home page carousel controls
Book availability filtering
Gallery modal opening
Gallery Previous and Next controls
Add Book required fields
Valid and invalid image file types
Book cover image preview
Light and dark mode
Responsive page layouts
AI Use

ChatGPT was used during development to assist with debugging, layout comparison, JavaScript functionality and troubleshooting.

Detailed records of meaningful AI use, including prompts, changes made and verification, are documented in process-evidence.md.

Deployment

The completed website is deployed using the required course hosting environment.

Live Website: (http://titan.csit.rmit.edu.au/~s3967816/wp/)

GitHub Repository: (https://github.com/s3967816/wp.git)
Known Limitations

BookVerse is a front-end website and does not use a database or server-side processing. The Add Book form therefore validates user input and previews the selected cover image but does not permanently add a book to the collection.

Author

Student ID: s3967816
