$(function () {
    var descriptionStatus;

    var showTool = function() {
        var tool = '#' + $(this).val();
        if (tool === '') {
            return;
        }
        $('.equationForm').css('display', 'none');
        $(tool).css('display','block');
    };

    var showDesciption = function() {
        if(descriptionStatus) {
            return;
        }
        $('#airspeed .description').show();
        descriptionStatus = true;
    };
    var hideDesciption = function() {
        if(!descriptionStatus) {
            return;
        }
        $('#airspeed .description').hide();
        descriptionStatus = false;
    };
    var toggleDesciption = function() {
        if (!descriptionStatus) {
            showDesciption();
        } else {
            hideDesciption();
        }
        return false;
    };

    var minMaxCheck = function(min, max, val, name, id) {
        if (val < min || val > max ){
            $(id).text('Enter a valid ' + name + ' [' + min + ', ' + max + ']');
            return false;
        }
        return true;
    };

    var getAirspeed = function() {
        var speed = $("input[name=speed]").val();
        var speedType = $("select[name=speedType]").val();
        var altitude = $("input[name=altitude]").val();
        var deltatk = $("input[name=deltatk]").val();
        if (speed === '') {
            $('#airspeed .error').text('Enter a speed');
            return;
        }
        if (altitude === '') {
            $('#airspeed .error').text('Enter an altitude');
            return;
        }
        if (deltatk === '') {
            deltatk = 0;
        }
        if(speedType === 'MACH') {
            var maxSpeed = 50;
        } else if(speedType === 'KTAS') {
            var maxSpeed = 2000;
        } else {
            var maxSpeed = 1000;
        }
        var validSpeed = minMaxCheck(0, maxSpeed, speed, 'speed', '#airspeed .error');
        if(validSpeed === false) {
            return;
        }
        var validAltitude = minMaxCheck(0, 232940, altitude, 'std. atmos.', '#airspeed .error');
        if(validAltitude === false) {
            return;
        }
        var validDeltatk = minMaxCheck(0, 150000, deltatk, 'deltatk', '#airspeed .error');
        if(validDeltatk === false) {
            return;
        }
        $('#airspeed .error').text('');
        var jsonData = $.ajax({
            type: "GET",
            url: "http://nicolekato.com/wsgi-scripts/airspeed",
            contentType: "application/json; charset=utf-8",
            data: "speed=" + speed + "&speed_type=" + speedType + "&alt=" + altitude + "&deltatk=" + deltatk,
            dataType: 'json',
            complete: function(r){
                var responseJSON = r.responseJSON;
                responseJSON = $.makeArray(responseJSON);
                var result = "<div><span class = 'title'>KCAS: </span>" + responseJSON[0].KCAS + " knots</div>";
                result = result + "<div><span class = 'title'>KTAS: </span>" + responseJSON[0].KTAS + " knots</div>";
                result = result + "<div><span class = 'title'>MACH: </span>" + responseJSON[0].MACH + " </div>";
                $("#airspeed .answer").html(result);
            }
        });

    };
    var getStdAtmos = function() {
     	var alt = $("input[name=std_atmos]").val();
        if (alt === '') {
            return;
        }
        var validAlt = minMaxCheck(0, 232940, alt, 'std. atmos.', '#std-atmos .error');
        if(validAlt === false) {
            return;
        }
        $('#std-atmos .error').text('');
	    var jsonData = $.ajax({
	        type: "GET",
	        url: "http://nicolekato.com/wsgi-scripts/std_atmos",
	        contentType: "application/json; charset=utf-8",
	        data: "alt=" + alt,
	        dataType: 'json',
	        complete: function(r){
                var responseJSON = r.responseJSON;
                responseJSON = $.makeArray(responseJSON);
				var result = "<div><span class = 'title'>Std. Pressure: </span>" + responseJSON[0].s_press + " Pa</div>";
				result = result + "<div><span class = 'title'>Std. Temperature: </span>" + responseJSON[0].s_temp + " K</div>";
				$("#std-atmos .answer").html(result);
	    	}
	    });

    };
    var reset = function() {
    	$('.answer').text('');
    	$('input').val('');
    };

    // Show/hide the description
    $("select[name='type']").change(showTool);
    $("#std-atmos .title").click(toggleDesciption);
    $("#airspeed .title").click(toggleDesciption);

    $("#submit").click(function() {
        if ($('#airspeed').is(':visible')) {
            getAirspeed();
        }
        if ($('#std-atmos').is(':visible')) {
            getStdAtmos();
        }      
    });
    $("#reset").click(reset);

});