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

    const deleteButton = document.getElementById('delete-button');
    const deleteForm = document.getElementById('delete-form');

    if (deleteButton && deleteForm) {
        deleteButton.addEventListener('click', function () {
            if (confirm('Are you sure?')) {
                showSubmitingFormElement();
                deleteForm.submit();
            }
        });
    }

    const homeDeleteButtons = document.querySelectorAll('.home-delete-forms');
    homeDeleteButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            if (confirm('Are you sure?')) {
                showSubmitingFormElement();
                const dataContactId = btn.getAttribute('data-contactId');
                const deleteForm = document.getElementById(`delete-form-${dataContactId}`);
                deleteForm.submit();
            }
        });
    });
});

function showSubmitingFormElement() {
    document.querySelector("#submiting-form").classList.add("active");
}