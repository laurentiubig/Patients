
        particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
            console.log('callback - particles.js config loaded');
          });

$(function() {


    // **********mostly ajax calls***********
        $('#login-btn').click(function(e){
            e.preventDefault();
            var postData=$('#login-form').serialize();

                $.ajax({
                    url: "php/login.php",
                    type: "post",
                    data: postData,
                    success: function(rsp){
                            console.log("logged mere");
                        var data= JSON.parse(rsp);
                        if(data.error == 1){
                            console.log("error");
                        }else{
                            window.location.replace("patients.php");
                        }
                    }
                });
        });

        $('#register-btn').click(function(e){
            
            e.preventDefault();
            if($("#register-username").val()){
                //display none if there is input isn t empty
                $("#u-error").fadeOut();

                if($("#register-pass").val() == $("#register-cpass").val() && $("#register-pass").val() != "" ){
                    //display none if there is input isn t empty
                    $("#r-error").fadeOut();

                    var postData=$('#register-form').serialize();

                        $.ajax({
                            url: "php/register.php",
                            type: "post",
                            data: postData,
                            success: function(rsp){
                                // console.log("mere");
                                var data= JSON.parse(rsp);
                                if(data.error == 1){
                                    console.log("error");
                                }else{
                                    console.log("succes");
                                }
                                location.reload();
                            }
                        });
                } // end pass check if
                else{
                    $("#r-error").fadeIn();
                }

            }else{
                $("#u-error").fadeIn();
            }//end username check if
            
           
        });

    
        $('#log-out-btn').click(function(e){
            e.preventDefault();

                $.ajax({
                    url: "php/logout.php",
                    type: "post",
                    success: function(rsp){
                            console.log("merellllll");
                            window.location.replace("index.php");
                        }
                    
                });
        });

       

        $('#add-btn').click(function(e){
            e.preventDefault();
            var postData=$('#add-patients-form').serialize();

                $.ajax({
                    url: "php/addpat.php",
                    type: "post",
                    data: postData,
                    success: function(rsp){
                            console.log("mere");
                        generateTable();
                    }
                });
        });





        // ***********script for login animations **************

        $("#registerH-btn").click(function(){

            if($("#login-form").hasClass("inn")){
                $("#register-form").addClass("inn");
                $("#login-form").removeClass("inn");

                //change btn text
                $("#registerH-btn").text("Back to Login");
            }else{
        
                $("#login-form").addClass("inn");
                $("#register-form").removeClass("inn");
            

                //change btn text
                $("#registerH-btn").text("Register Here");
            }
        });
        // ***********script for add patient animation **************
        $("#add-pat-btn").click(function(){
            if($("#add-patients-form").hasClass("inn")){
                $("#add-patients-form").removeClass("inn");
                //change btn text
                $("#add-pat-btn").text("Add Patient");
            }else{
                $("#add-patients-form").addClass("inn");

                $("#add-pat-btn").text("Close");
            }
        });



});


