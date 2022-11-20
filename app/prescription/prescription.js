(function($) {
  "use strict";

  $(document).on('submit', '#add-prescription', function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url:"prescription_action.php",
        method:"post",
        data:formData,
        dataType:'JSON',
    }).done(function(data){
      console.log(data);
      Swal.fire({
        icon: data[2],
        title: data[3],
        text: data[4]
      });
    }).fail(function(data){
      console.log(data);
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!'
      });
    })
  })

})(jQuery);