$(document).ready(function() {
    $('#registration-form').submit(function(event) {
        event.preventDefault(); // prevent form from submitting normally
        var formData = $(this).serialize(); // get form data
        $.ajax({
            type: 'POST',
            url: 'register.php', // PHP script to handle form submission
            data: formData,
            dataType: 'json',
            encode: true
        })
        .done(function(data) {
            if (data.success) {
                alert('Registration successful!'); // show success message
                window.location.href = 'login.php'; // redirect to login page
            } else {
                alert(data.message); // show error message
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus); // show error message
        });
    });
});
