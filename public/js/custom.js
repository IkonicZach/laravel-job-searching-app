document.addEventListener('DOMContentLoaded', function () {
    // Tooltip initialization
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

function toggleAccordion(header) {
    var content = header.nextElementSibling;
    content.style.display = (content.style.display === 'block') ? 'none' : 'block';
}

function closeAccordion(content) {
    content.style.display = 'none';
}
