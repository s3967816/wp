## Debugging Records

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
