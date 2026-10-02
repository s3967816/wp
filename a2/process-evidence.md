## Debugging Records A1

Debugging record 1- Add Book Layout
Date: 21 August 2026
File affected: add.html , assets/css/style.css
Root cause: Bootstrap column classes made some fields half-width, and the required dark-mode form styling was missing. 
Fix applied: Changed Title, Author and Genre to full width and added the correct dark container, inputs and spacing.  
Verification/testing: Tested at 100% zoom and compared the page with the supplied screenshot.  
GitHub commit: (https://github.com/s3967816/wp/commit/5c3e6304ade5665871845b311ac117cb75df4e37)



Debugging Record 2 — Image Preview Not Working
Date identified and fixed:** 21 August 2026  
File affected: assets/js/scripts.js  
Issue: Selecting a cover image on the Add Book page did not display a preview.  
Root cause: Gallery JavaScript tried to add event listeners to elements that did not exist on `add.html`, which stopped the rest of the script.  
Fix applied: Added checks so the Gallery modal code only runs when its required elements exist.  
Verification/testing: Selected an image and confirmed the preview appeared, then tested the Gallery Previous/Next controls.  
GitHub commit: [(https://github.com/s3967816/wp/commit/0a27bef03c7b53d09b084e74e23102fb97fd7522)](https://github.com/s3967816/wp/commit/0a27bef03c7b53d09b084e74e23102fb97fd7522)



Debugging Record 3 — Navbar Layout
Date identified and fixed: 21 August 2026  
File affected: index.html, books.html, gallery.html, add.html, assets/css/style.css  
Issue: The navbar did not match the reference screenshots and the navigation links needed the correct positioning and icons.  
Root cause: The original navbar structure and Bootstrap alignment did not match the required design.  
Fix applied: Updated the navbar structure, navigation links, icons and shared navbar styling.  
Verification/testing: Checked the navbar appearance and links across all four pages.  
GitHub commit: (https://github.com/s3967816/wp/commit/f80b7fd54f53f0f9b0bf40e4c3e718e0a16dba1c)





AI Use Records

AI Use Record 1 — Add Book Page Layout

Date: 21 August 2026  
Tool used: ChatGPT  
Task description: Improve the Add Book page so that its layout matched the supplied reference screenshot.

Prompt/input used: I provided screenshots of my current Add Book page and the required design and asked ChatGPT to compare them and help correct the form layout, sizing and styling.

Summary of AI output: ChatGPT suggested changes to the Bootstrap form structure and CSS, including full-width Title, Author and Genre fields, a larger form container, dark input styling and improved spacing.

Accepted/rejected/modified: I accepted the general layout and CSS suggestions but modified the sizing and spacing after comparing the result with the reference screenshot.

Testing/verification: I refreshed add.html at 100% zoom and visually compared it with the supplied dark-mode screenshot.



AI Use Record 2 — Debugging Image Preview

Date: 21 August 2026  
Tool used: ChatGPT  
Task description: Diagnose why the Add Book cover image preview was not appearing.

Prompt/input used: I provided my complete add.html and scripts.js code and explained that selecting an image did not display the preview.

Summary of AI output: ChatGPT identified that the Gallery JavaScript was trying to add event listeners to elements that did not exist on add.html. This caused a JavaScript error before the image preview code could run.

Accepted/rejected/modified: I accepted the suggested conditional check around the Gallery code while keeping my existing image preview functionality.

Testing/verification: I selected a valid image on add.html and confirmed the preview appeared. I also retested the Gallery Previous and Next buttons to confirm they still worked.



AI Use Record 3 — Gallery Modal Functionality

Date: 20 August 2026  
Tool used: ChatGPT  
Task description: Implement and improve the Gallery modal so users could view book covers and navigate between them.

Prompt/input used: I provided the required Gallery screenshot and explained that the modal needed to display the selected book cover with Previous and Next navigation buttons.

Summary of AI output: ChatGPT suggested the Bootstrap modal structure and JavaScript for tracking the selected image and moving forward or backward through the gallery.

Accepted/rejected/modified: I used the suggested modal approach and later modified the JavaScript and styling to better match the supplied screenshot and work with my existing gallery.

Testing/verification: I clicked different gallery images to confirm the correct cover opened, then tested the Previous and Next buttons including navigation between multiple images.






## Assignment 2 Debugging Records

Debugging Record 4 — Database Connection Error

Date identified and fixed: 2 October 2026
File affected: includes/db_connect.inc
Issue: The website could not connect to the Jacob 5 database and displayed a database connection error.
Root cause: The database username was entered in lowercase but my SDAMS database username used uppercase characters.
Fix applied: Updated the database username in db_connect.inc to match the username shown in SDAMS.
Verification/testing: Reloaded the website on Titan and confirmed that the database connection worked and the books were displayed correctly.
GitHub commit: ADD COMMIT LINK


Debugging Record 5 — Navigation Links Going to HTML Pages

Date identified and fixed: 2 October 2026
File affected: gallery.php, add.php
Issue: Some navigation links were still going to the old .html pages and caused a 404 error.
Root cause: Some of the old Assignment 1 navigation code was still inside the PHP pages after converting the website to PHP.
Fix applied: Removed the old navigation code and used the shared nav.inc file so the pages all use the correct .php links.
Verification/testing: Tested Home, Browse Books, Gallery and Add Book several times and confirmed all navigation links opened the correct PHP pages.
GitHub commit: ADD COMMIT LINK


Debugging Record 6 — Gallery Book Titles

Date identified and fixed: 2 October 2026
File affected: gallery.php, assets/js/scripts.js
Issue: The Gallery modal could display the wrong book title after changing the gallery to use books from the database.
Root cause: The JavaScript still relied on book information that was not coming directly from the database generated gallery images.
Fix applied: Added the book title as a data-title attribute to each gallery image and updated the JavaScript to read the title from the selected image.
Verification/testing: Opened different covers in the Gallery and used the Previous and Next buttons to check that the modal updated the image and title.
GitHub commit: ADD COMMIT LINK


Debugging Record 7 — SQL Deployment Comments

Date identified and fixed: 2 October 2026
File affected: bookverse.sql
Issue: Some of the SQL lines used to separate the local database setup from the Jacob 5 deployment setup were not commented correctly.
Root cause: The SQL comments were written without a space after the two dashes, so MySQL did not recognise them correctly as comments.
Fix applied: Corrected the comment formatting and left the local database creation commands commented out for Jacob 5 deployment.
Verification/testing: Pulled the corrected file onto Titan and checked that the working directory was clean after the update.
GitHub commit: ADD COMMIT LINK


## Assignment 2 Debugging Records

Debugging Record 4 — Database Connection Error

Date identified and fixed: 2 October 2026
File affected: includes/db_connect.inc
Issue: The website could not connect to the Jacob 5 database and was showing a database connection error.
Root cause: The database username did not match the username shown in SDAMS.
Fix applied: Updated the database connection credentials so they matched my Jacob 5 database details.
Verification/testing: Reloaded the website on Titan and confirmed that the connection worked and books were loading from the database.
GitHub commit: https://github.com/s3967816/wp/commit/83ada33


Debugging Record 5 — Old HTML Navigation Links

Date identified and fixed: 2 October 2026
File affected: PHP navigation and page files
Issue: Some navigation links were still trying to open the old .html pages and caused a 404 error.
Root cause: Some links from Assignment 1 had not been changed from .html to .php.
Fix applied: Changed the old navigation links to use the new PHP pages.
Verification/testing: Clicked through Home, Browse Books, Gallery and Add Book multiple times and confirmed that the correct PHP pages opened.
GitHub commit: https://github.com/s3967816/wp/commit/4eace43


Debugging Record 6 — Gallery Modal Titles

Date identified and fixed: 2 October 2026
File affected: gallery.php, assets/js/scripts.js
Issue: The Gallery modal could show the wrong title after changing the gallery to load books from the database.
Root cause: The Gallery JavaScript was not getting the title directly from the database generated gallery item.
Fix applied: Made the gallery titles dynamic and added the book title to a data-title attribute on each gallery image.
Verification/testing: Opened different Gallery images and used the Previous and Next buttons to confirm that the title and image changed correctly.
GitHub commits:
https://github.com/s3967816/wp/commit/239dcfc
https://github.com/s3967816/wp/commit/29da0c9


Debugging Record 7 — SQL Deployment Comments

Date identified and fixed: 2 October 2026
File affected: bookverse.sql
Issue: Some SQL lines for the local database setup were not commented correctly.
Root cause: The SQL comments did not have a space after the two dashes, so they were not written in the correct comment format.
Fix applied: Corrected the SQL comments and left the local database creation commands commented out for deployment.
Verification/testing: Pulled the updated SQL file onto Titan and used git status to confirm the working directory was clean.
GitHub commit: https://github.com/s3967816/wp/commit/4122866


## Assignment 2 AI Use Records

AI Use Record 4 — Database Connection Error

Date: 2 October 2026
Tool used: ChatGPT
Task description: Help find why my PHP website could not connect to the Jacob 5 database.

Prompt/input used: I provided the database connection error and my connection setup and asked ChatGPT to help find the problem.

Summary of AI output: ChatGPT helped compare the connection details with SDAMS and found that my database username did not match the username shown there.

Accepted/rejected/modified: I updated the database credentials but kept my existing connection structure.

Testing/verification: I refreshed the website on Titan and confirmed that the database connection worked and the books loaded correctly.


AI Use Record 5 — Fixing HTML Navigation Links

Date: 2 October 2026
Tool used: ChatGPT
Task description: Find why some navigation links were still opening old .html pages.

Prompt/input used: I explained that some pages were going back to .html links and causing a 404 error.

Summary of AI output: ChatGPT suggested searching my A2 files for .html references, which helped find the old links.

Accepted/rejected/modified: I changed the old links to .php and kept the shared PHP navigation.

Testing/verification: I clicked through Home, Browse Books, Gallery and Add Book and confirmed all of the links worked.


AI Use Record 6 — Gallery Modal Titles

Date: 2 October 2026
Tool used: ChatGPT
Task description: Fix the Gallery modal titles after changing the gallery to load books from the database.

Prompt/input used: I explained that some Gallery titles were wrong and provided the PHP and JavaScript being used.

Summary of AI output: ChatGPT suggested putting the database book title into a data-title attribute and reading that value when the modal was updated.

Accepted/rejected/modified: I used the data-title approach and changed the Gallery JavaScript so the titles were no longer hard-coded.

Testing/verification: I opened different Gallery images and tested the Previous and Next buttons to confirm the title and image changed.


AI Use Record 7 — SQL Deployment File

Date: 2 October 2026
Tool used: ChatGPT
Task description: Check my bookverse.sql file for the Jacob 5 deployment.

Prompt/input used: I showed the start of my SQL file and asked ChatGPT to check the local database and deployment setup.

Summary of AI output: ChatGPT found that some SQL comments were formatted incorrectly and suggested keeping the local CREATE DATABASE and USE commands commented out for Jacob 5.

Accepted/rejected/modified: I corrected the comments and left the rest of my table and sample data unchanged.

Testing/verification: I committed the SQL changes, pulled them onto Titan and used git status to confirm everything was clean.
