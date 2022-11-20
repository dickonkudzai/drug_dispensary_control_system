(function($) {
  "use strict";

  $('#loader').addClass('hidden');

  //user login
  $(document).on('submit', '#user-login', function(event)
  {
      console.log(1);
      event.preventDefault();
      $('#submit').addClass('hidden');
      $('#loader').removeClass('hidden');
      var formData = $(this).serialize();
      $.ajax(
      {
        url:"app/auth/auth_action.php",
        method:"post",
        data:formData,
        dataType:'JSON',
        success:function(data)
        {
          // console.log(data);
          if (data[0]!=0) 
          {
            $('#alert_action').html(data[1]);
            // console.log(data);
            setTimeout(function()
                {
                    window.location = data[2];
                }, 1000);
          }
          else
          {
            $('#alert_action').html(data[1]);
            console.log(data);
            setTimeout(function()
                {
                    window.location = data[2];
                }, 1000);
          }
          
        },
        error:function(data)
        {
          console.log(data);
        }
      })
  })

})(jQuery);