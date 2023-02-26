$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault(); // prevent form from submitting normally
        var formData = $(this).serialize(); // get form data
        $.ajax({
            type: 'POST',
            url: 'login.php', // PHP script to handle form submission
            data: formData,
            dataType: 'json',
            encode: true
        })
        .done(function(data) {
            if (data.success) {
                alert('Login successful!'); // show success message
                window.location.href = 'profile.php'; // redirect to profile page
            } else {
                alert(data.message); // show error message
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus); // show error message
        });
    });
});
