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
