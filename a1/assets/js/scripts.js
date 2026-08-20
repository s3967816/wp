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

galleryTriggers.forEach(function (image) {

    image.addEventListener("click", function () {

        const imagePath = this.getAttribute("data-image");

        modalImage.src = imagePath;
        modalImage.alt = this.alt;

    });

});
