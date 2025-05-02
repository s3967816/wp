document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.querySelector('nav select');

    dropdown.addEventListener('change', function() {
        const selectedOption = dropdown.value;
        window.location.href = selectedOption;
        switch (selectedOption) {
            case 'Home':
                window.location.href = 'index.php';
                break;
            case 'Games':
                window.location.href = 'games.php';
                break;
            case 'Add Game':
                window.location.href = 'add.php';
                break;
            case 'Gallery':
                window.location.href = 'gallery.php';
                break;
            case 'Home':
                    window.location.href = 'index.php';
                break;
            default:
                break;
        }
    });
});