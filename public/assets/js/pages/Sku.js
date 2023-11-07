
// Get all "Edit" buttons
const editButtons = document.querySelectorAll('.edit-btn');

// Function to open the modal and populate it with data
function openModal(itemId) {
    // Make an AJAX request to retrieve data (adjust the URL accordingly)
    $.ajax({
        url: `/skus/get/${itemId}`,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#name').val(data.name);
            $('#code').val(data.code);
            $('#price').val(data.price);
            $("#status option[value='"+data.status+"']").prop('selected', true);
            $("#selUser option[value='"+data.uid+"']").prop('selected', true);
        },
        error: function(xhr, status, error) {
            console.error('An error occurred:', error);
        }
    });
}

// Add click event listeners to the "Edit" buttons
editButtons.forEach(button => {
    button.addEventListener('click', function() {
        const itemId = button.getAttribute('data-id');
        const link = '/skus/update/' + itemId;
        $('#edit-form').attr('action', link);
        openModal(itemId);
    });
});

// Get all the table cells with a class of "preview-image"
const previewImages = document.querySelectorAll('.preview-image');

// Attach hover event listeners to each of them
previewImages.forEach((image) => {
    const td = image.parentElement;
    const preview = td.querySelector('.preview');

    // Show the preview when the cell is hovered
    td.addEventListener('mouseenter', () => {
        preview.style.display = 'block';
    });

    // Hide the preview when the mouse leaves the cell
    td.addEventListener('mouseleave', () => {
        preview.style.display = 'none';
    });
});

