$(document).ready(function() {
    $('#submit').attr('disabled', 'disabled');

    $("input").keyup(function () {
        var ucase = new RegExp("[A-Z]+");
        var disable = false;
        disable = false;
        if ($("#password").val().length >= 6) {
            $("#8char").removeClass("glyphicon-remove");
            $("#8char").addClass("glyphicon-ok");
            $("#8char").css("color", "#00A41E");
            $('#submit').removeAttr('disabled');
        } else {
            $("#8char").removeClass("glyphicon-ok");
            $("#8char").addClass("glyphicon-remove");
            $("#8char").css("color", "#FF0004");
            disable = true;
        }

        if($("#password")) {
        if (ucase.test($("#password").val())) {
            $("#ucase").removeClass("glyphicon-remove");
            $("#ucase").addClass("glyphicon-ok");
            $("#ucase").css("color", "#00A41E");
            $('#submit').removeAttr('disabled');
        } else {
            $("#ucase").removeClass("glyphicon-ok");
            $("#ucase").addClass("glyphicon-remove");
            $("#ucase").css("color", "#FF0004");
            $('#submit').attr('disabled', 'disabled');
            disable = true;
        }

        if ($("#password").val() == $("#passwordConfirmation").val()) {
            $("#pwmatch").removeClass("glyphicon-remove");
            $("#pwmatch").addClass("glyphicon-ok");
            $("#pwmatch").css("color", "#00A41E");
            $('#submit').removeAttr('disabled');
        } else {
            $("#pwmatch").removeClass("glyphicon-ok");
            $("#pwmatch").addClass("glyphicon-remove");
            $("#pwmatch").css("color", "#FF0004");
            $('#submit').attr('disabled', 'disabled');
            disable = true;
        }

        if (!$('#lastName').val() || !$('#firstName').val() || !$('#email').val()||  !$('#address').val()
                || !$('#cp').val() | !$('#town').val() || disable) {
            $('#submit').attr('disabled', 'disabled');
        } else {
            $('#submit').removeAttr('disabled');
        }

    });
});