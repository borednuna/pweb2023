$(document).ready(function() {
    // Attach the submit event handler to the form
    $('#login-form').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        validateForm(); // Call the validation function
    });

    // Function to validate and display the alert
    function validateForm() {
        var email = $('#email').val();
        var password = $('#key').val();

        if (email === "" || password === "") {
            // Empty field detected, show the alert
            $('#alert-message').show();
        } else {
            // Fields are not empty, hide the alert
            $('#alert-message').hide();
            // Submit the form or perform other actions here
        }
    }

    // Attach this function to the form submission
    $('#login-form').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        validateForm(); // Call the validation function
    });
});

function showPassword() {
    var key_attr = $('#key').attr('type');
    
    if(key_attr != 'text') {
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
    } else {
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
    }
}