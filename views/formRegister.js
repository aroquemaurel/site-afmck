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

        if($('#adeliNumber').val().match("^[0-9]{9}$")) {
            $("#adeli").removeClass("glyphicon-remove");
            $("#adeli").addClass("glyphicon-ok");
            $("#adeli").css("color", "#00A41E");
            $('#submit').removeAttr('disabled');
        } else {
            $("#adeli").removeClass("glyphicon-ok");
            $("#adeli").addClass("glyphicon-remove");
            $("#adeli").css("color", "#FF0004");
            $('#submit').attr('disabled', 'disabled');
            disable = true;

        }
        if (!$('#lastName').val() || !$('#firstName').val() || !$('#email').val()||  !$('#address').val()
                || !$('#cp').val() || !$('#town').val() || !$('#adeliNumber').val().match("^[0-9]{9}$")
            || $('#levelFormation').index() == -1 || disable) {
            $('#submit').attr('disabled', 'disabled');
        } else {
            $('#submit').removeAttr('disabled');
        }
    });
});