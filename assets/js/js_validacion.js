$(function() {
    'use strict';

    var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

    $("#nombre").blur(function() {
        if ($(this).val() == '') {
            //name.addClass("error");
            //nameInfo.text("Debe rellenar su nombre!");
            //nameInfo.addClass("error");
            alert('Completa los campos vacíos');
        }
    });

    $("#email_val").blur(function() {
        if ($(this).val() == '') {
            alert('Completa los campos vacíos');
        }
    });

    $("#email_val").blur(function() {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var emailaddress = $("#email_val").val();
        if (!emailReg.test(emailaddress)) $("#emailspan").html //('Please enter valid Email address');
        else $("#emailspan").html('');
    });



});