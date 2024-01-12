document.addEventListener('DOMContentLoaded', function () {
    var myToast = new bootstrap.Toast(document.getElementById('myToast'));

    // Show the toast immediately without any delay
    myToast.show();
});

function toggleAccordion(header) {
    var content = header.nextElementSibling;
    content.style.display = (content.style.display === 'block') ? 'none' : 'block';
}

function closeAccordion(content) {
    content.style.display = 'none';
}
