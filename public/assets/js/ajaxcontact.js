$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        var challenge = $('#challenge').val();
        console.log(typeof(challenge));
        if (challenge != "13") {
            $('div.forms form').remove();
            $('#msgsent').append(
                `<p>Error! Please try again:<a class="btn" href="index.php">reload form</a></p>`);
        } else {
            $.ajax({
                url: 'contactDH.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function () {
                    console.log('successful!');
                    console.log(formData);
                }
            });
            // location.reload();
            $('div.forms form').remove();
            $('#msgsent').append(
                `<p>Thank you for your message!</p>`);
        }
    });
})