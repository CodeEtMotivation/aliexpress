document.addEventListener('DOMContentLoaded', function() {
    // Get all open modal buttons
    const openModalBtns = document.querySelectorAll('.openModalBtn');

    openModalBtns.forEach(button => {
        button.addEventListener('click', function() {
            // Get the modal ID from data attribute
            const modalId = this.getAttribute('data-modal-id');
            const modal = document.getElementById(modalId);
            modal.style.display = 'block';
        });
    });

    // Get all close buttons
    const closeButtons = document.querySelectorAll('.close');

    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.modal');
            modal.style.display = 'none';
        });
    });

    // Close modals when clicking outside of them
    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });
});