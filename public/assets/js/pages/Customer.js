
// Get all "Edit" buttons
const editButtons = document.querySelectorAll('.edit-btn');

// Function to open the modal and populate it with data
function openModal(itemId) {
    // Make an AJAX request to retrieve data (adjust the URL accordingly)
    $.ajax({
        url: `/customers/get/${itemId}`,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#fname').val(data.fname);
            $('#lname').val(data.lname);
            $('#mobile').val(data.mobile);
            $('#city').val(data.city);
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
        const link = '/customers/update/' + itemId;
        $('#edit-form').attr('action', link);
        openModal(itemId);
    });
});

