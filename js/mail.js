function mail() {
    var msg   = $('.footer-form').serialize();
    console.log(msg);
      $.ajax({
        type: 'POST',
        url: '/mail/index',
        data: msg,
        success: function(data) {
          alert(data);
        },
        error:  function(xhr, str){
              alert('Возникла ошибка: ' + xhr.responseCode);
          }
      });

  }