$(document).ready(function(){
	$('#level-variable, #level-option').remove();
});

$('#variable').change(function() {
    // console.log($(this).val());
    $variable = $(this).val();
    if($variable == "temp" || $variable == "wind"){
        var level = "<label id='level-variable' style='color: black;margin-left: 10px;''>Cấp độ:</label> <br/><select class='custom_select_tag' id='level-option' name='level-option' style='margin-top: 2px;margin-bottom: 20px;'><option value='1000mb'>1000mb</option><option value='850mb'>850mb</option><option value='500mb'>500mb</option><option value='250mb'>250mb</option></select>";
        $('#add-level').html(level);
        
    }else{
        
        $('#add-level').html("<span id='add-level' ></span>");
    }
});

$('#type-result').change(function() {
    // console.log($(this).val());
    $('#label-type-map, #type-map').remove();
    var variable = $(this).val();
    if(variable == "map"){
        var level = "<label id='label-type-map' style='color: black;margin-left: 10px;''>Dạng biểu đồ:</label> <br/><select class='custom_select_tag' id='type-map' name='type-map' style='margin-top: 2px;margin-bottom: 20px;'><option >contour</option><option >shaded</option></select>";
        $('#add-type-map').html(level);
        
    }else{
        
        $('#add-type-map').html("<span id='add-type-map' ></span>");
    }
});

