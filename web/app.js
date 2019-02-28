document.addEventListener("DOMContentLoaded", function (event) {

    if (typeof document.getElementById('register_form') !== "undefined") {
        validateRegisterForm()
    }

});


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateRegisterForm() {

    document.getElementById('register_form').onsubmit = function () {

        var pswrd1 = document.getElementById('password_1');
        var pswrd2 = document.getElementById('password_2');
        var success = true;
        var errorColor = "#ff6666";

        var passwordErrors = document.getElementById('password_mismatch_errors');

        if (pswrd1.value !== pswrd2.value) {

            pswrd1.style.backgroundColor = errorColor;
            pswrd2.style.backgroundColor = errorColor;
            passwordErrors.style.color = errorColor;
            passwordErrors.innerHTML = "Hasła nie pasują do siebie!"
            success = false;
        } else {

            pswrd1.style.backgroundColor = null;
            pswrd2.style.backgroundColor = null;
            passwordErrors.innerHTML = '';
        }

        var email = document.getElementById('email');

        if (!validateEmail(email.value)) {
            var emailError = document.getElementById('email_errors');

            email.style.backgroundColor = errorColor;

            emailError.style.color = errorColor;
            emailError.innerHTML = "Niepoprawy e-mail";
            success = false;
        } else {

            email.style.backgroundColor = null;
            emailError.innerHTML = '';
        }


        return success;
    }
}
