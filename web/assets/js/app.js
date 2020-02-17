const tarkovAccountLoginForm = $('#tarkov_account_login');

tarkovAccountLoginForm.on('submit', event => {
    event.preventDefault();

    const url = tarkovAccountLoginForm.attr('action');

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            email: tarkovAccountLoginForm.find('#email').val().trim(),
            password: tarkovAccountLoginForm.find('#password').val().trim(),
            hwid: tarkovAccountLoginForm.find('#hwid').val().trim()
        },
        success: response => {
            console.log(response);
        }
    })
});
