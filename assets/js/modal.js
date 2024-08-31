// Get modal element
const modal = document.getElementById('qr-modal');
// Get overlay element
const overlay = document.getElementById('overlay');
// Get the image, title, and close button elements
const qrImage = document.getElementById('qr-image');
const modalTitle = document.getElementById('modal-title');
const closeBtn = document.querySelector('.modal .close');
// Get all QR code links
const qrLinks = document.querySelectorAll('.qr-link');

// Add event listener to all QR code links
qrLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        const qrCodeSrc = this.getAttribute('data-qr'); // Get QR code URL from data attribute
        const plantTitle = this.getAttribute('data-title'); // Get plant title from data attribute
        qrImage.src = qrCodeSrc; // Set the src of the image
        modalTitle.textContent = plantTitle; // Set the title in the modal
        overlay.style.display = 'block'; // Show the overlay
        modal.style.display = 'block'; // Show the modal
    });
});

// Add event listener to close button
closeBtn.addEventListener('click', function() {
    modal.style.display = 'none'; // Hide the modal
    overlay.style.display = 'none'; // Hide the overlay
});

// Add event listener to window to close the modal if clicked outside
window.addEventListener('click', function(event) {
    if (event.target === overlay) {
        modal.style.display = 'none'; // Hide the modal
        overlay.style.display = 'none'; // Hide the overlay
    }
});
