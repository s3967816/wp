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
