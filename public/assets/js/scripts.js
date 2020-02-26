$(document).ready(function () {

  $('form').submit(function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    console.log(formData);
    $.ajax({
        url: 'contactDH.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            console.log('yay!');
            console.log('successful!');
            console.log(formData);
            $('form').remove();
            $('#msgsent').append(
                `<div class="notice">Thank you for your message!</div>`
            );
        }
    });
  });

  if(window.location.hash) {
    var y = window.location.hash.substring(1);
    // console.log(y);
    hTopPage(y);
  } else {
    console.log('none');
  }

  $('a[href*="#"]').on('click', function(event) {
    var h = this.hash;
    if (h) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: $(h).offset().top
      }, hTopPage(h));
    };
    if (active.length > 0) {
      active[0].className = active[0].className.replace("active", "");
    }
    this.className += " active";
  });
});

function hTopPage(hashString) {
  window.location.hash = hashString;
};


