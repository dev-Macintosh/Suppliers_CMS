function mail() {
    var msg   = $('.footer-nav-block-feedback').serialize();
    console.log(msg)
      $.ajax({
        type: 'POST',
        url: '/mail/index',
        data: msg,
        success: function(data) {
          alert(data);

          $('.footer-nav-block-feedback')[0].reset();
        },
        error:  function(xhr, str){
              alert('Возникла ошибка: ' + xhr.responseCode);
          }
      });

  }