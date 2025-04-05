document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('auth-login');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            showSubmitingFormElement();
        });
    }

    const createContactForm = document.getElementById('create-contact-form');
    if (createContactForm) {
        createContactForm.addEventListener('submit', function (e) {
            showSubmitingFormElement();
        });
    }
    
    const updateForm = document.getElementById('update-form');
    if (updateForm) {
        updateForm.addEventListener('submit', function (e) {
            showSubmitingFormElement();
        });
    }
});

function showSubmitingFormElement() {
    document.querySelector("#submiting-form").classList.add("active");
}