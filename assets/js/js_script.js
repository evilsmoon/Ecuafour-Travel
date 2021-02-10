$(function() {
    'use strict';
    $(function() {
        $('#clientes').animateNumber({
            number: 120
        }, 12000);
        $('#viajes').animateNumber({
            number: 2500
        }, 6000);
        $('#paquetes').animateNumber({
            number: 50
        }, 25000);
        $('#promociones').animateNumber({
            number: 20
        }, 30000);
    });

    $("#btn-enviar").click(function(e) {

        $(".btn-paypal").css("display", "block");
        console.log("entra");
    });


    /*
        $("#box-1").mouseenter(function() {

            $(this).css("opacity", "0");
            $("#love").css("display", "block");
        });

        $("#love").mouseenter(function() {

            $("#box-1").css("opacity", "0");
            $("#love").css("display", "block");
        });


        $("#box-1").mouseleave(function() {

            $(this).css("opacity", "1");
            $("#love").css("display", "none");

        });

    */



});