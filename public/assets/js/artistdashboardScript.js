$(document).ready(function () {
    // console.log('connected');

    $('#profile').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        $('#acct-panel').toggle();
    });

    $('#roster').click(function (ev) {
        ev.preventDefault();
        ev.stopPropagation();
        ev.stopImmediatePropagation();
        $('#roster-panel').toggle();

        $('#roster-panel').on('click', '.btn.rmva-btn', function () {
            var artistid = $(this).val();
            console.log(artistid);
            $('#delete').modal('show');
            $('div.modal').on('click', '#confirmdelete', function () {
                var deletedata = {
                    uuid: artistid,
                };
                $.ajax({
                    type: "POST",
                    url: "deleteartistDH.php",
                    cache: false,
                    data: deletedata,
                    success: function () {
                        console.log('success ajax delete');
                        $('#roster-panel table').remove();
                    }
                });
                location.reload();
            });
        })
    })
});


