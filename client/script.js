$('document').ready(function(){
    var username_state = false;
    var email_state = false;
    $('#nom').on('blur', function(){
     var nom = $('#nom').val();
     if (nom == '') {
         username_state = false;
         return;
     }
     $.ajax({
       url: 'register.php',
       type: 'post',
       data: {
           'username_check' : 1,
           'nom' : nom,
       },
       success: function(response){
         if (response == 'taken' ) {
             username_state = false;
             $('#nom').parent().removeClass();
             $('#nom').parent().addClass("form_error");
             $('#nom').siblings("span").text('Sorry... Username already taken');
         }else if (response == 'not_taken') {
             username_state = true;
             $('#nom').parent().removeClass();
             $('#nom').parent().addClass("form_success");
             $('#nom').siblings("span").text('Username available');
         }
       }
     });
    });		
     $('#email').on('blur', function(){
        var email = $('#email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
         url: 'register.php',
         type: 'post',
         data: {
             'email_check' : 1,
             'email' : email,
         },
         success: function(response){
             if (response == 'taken' ) {
             email_state = false;
             $('#email').parent().removeClass();
             $('#email').parent().addClass("form_error");
             $('#email').siblings("span").text('Sorry... Email already taken');
             }else if (response == 'not_taken') {
               email_state = true;
               $('#email').parent().removeClass();
               $('#email').parent().addClass("form_success");
               $('#email').siblings("span").text('Email available');
             }
         }
        });
    });
   
    $('#reg_btn').on('click', function(){
        var nom = $('#nom').val();
        var email = $('#email').val();
        var pass = $('#pass').val();
        if (username_state == false || email_state == false) {
         $('#error_msg').text('Fix the errors in the form first');
       }else{
         // proceed with form submission
         $.ajax({
             url: 'register.php',
             type: 'post',
             data: {
                 'save' : 1,
                 'email' : email,
                 'nom' : nom,
                 'pass' : pass,
             },
             success: function(response){
                 alert('user saved');
                 $('#nom').val('');
                 $('#email').val('');
                 $('#pass').val('');
             }
         });
        }
    });
   });