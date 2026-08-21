const statusFilter = document.getElementById("statusFilter");

if (statusFilter) {
    statusFilter.addEventListener("change", function () {

        const selectedStatus = this.value;
        const bookRows = document.querySelectorAll(".books-table tbody tr");

        bookRows.forEach(function (row) {

            const bookStatus = row.getAttribute("data-status");

            if (selectedStatus === "all" || bookStatus === selectedStatus) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }

        });
    });
}


const galleryTriggers = document.querySelectorAll(".gallery-trigger");
const modalImage = document.getElementById("modalImage");
const modalTitle = document.getElementById("galleryModalLabel");
const previousImage = document.getElementById("previousImage");
const nextImage = document.getElementById("nextImage");

const galleryBooks = [
    "The Midnight Library",
    "Project Hail Mary",
    "Dune",
    "The Hobbit",
    "1984",
    "Pride and Prejudice",
    "To Kill a Mockingbird",
    "The Great Gatsby",
    "Educated",
    "The Seven Husbands",
    "Atomic Habits",
    "Sapiens"
];

let currentImageIndex = 0;

function updateGalleryModal() {

    const selectedImage = galleryTriggers[currentImageIndex];

    const imagePath = selectedImage.getAttribute("data-image");

    modalImage.src = imagePath;
    modalImage.alt = galleryBooks[currentImageIndex];

    modalTitle.textContent = galleryBooks[currentImageIndex];
}

galleryTriggers.forEach(function (image, index) {

    image.addEventListener("click", function () {

        currentImageIndex = index;

        updateGalleryModal();

    });

});

previousImage.addEventListener("click", function () {

    currentImageIndex--;

    if (currentImageIndex < 0) {
        currentImageIndex = galleryTriggers.length - 1;
    }

    updateGalleryModal();

});

nextImage.addEventListener("click", function () {

    currentImageIndex++;

    if (currentImageIndex >= galleryTriggers.length) {
        currentImageIndex = 0;
    }

    updateGalleryModal();

});



// =========================================
// ADD BOOK - IMAGE VALIDATION AND PREVIEW
// =========================================

const imageInput = document.getElementById("image_path");
const imagePreview = document.getElementById("imagePreview");

if (imageInput && imagePreview) {

    const allowedExtensions = ["jpg", "jpeg", "png", "gif", "webp"];

    imageInput.addEventListener("change", function () {

        imagePreview.innerHTML = "";

        const file = imageInput.files[0];

        if (!file) {
            return;
        }

        const extension = file.name.split(".").pop().toLowerCase();

        if (!allowedExtensions.includes(extension)) {

            alert("Please select a JPG, JPEG, PNG, GIF or WEBP image.");

            imageInput.value = "";

            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {

            const previewImage = document.createElement("img");

            previewImage.src = event.target.result;
            previewImage.alt = "Book cover preview";
            previewImage.className = "book-cover-preview";

            imagePreview.appendChild(previewImage);
        };

        reader.readAsDataURL(file);

    });

}
