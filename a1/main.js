document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.querySelector('nav select');

    dropdown.addEventListener('change', function() {
        const selectedOption = dropdown.value;
        window.location.href = selectedOption;
        switch (selectedOption) {
            case 'Home':
                window.location.href = 'index.html';
                break;
            case 'Games':
                window.location.href = 'games.html';
                break;
            case 'Add Game':
                window.location.href = 'add.html';
                break;
            case 'Gallery':
                window.location.href = 'gallery.html';
                break;
            case 'Home':
                    window.location.href = 'index.html';
                break;
            default:
                break;
        }
    });
});