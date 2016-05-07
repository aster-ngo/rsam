var listURL;
var pathfolder;

$(document).ready(function(){
    $('#not-data').hide();
    $('#reset, #create-animation, #dialog-download, #dialog-shopping-card, #option-time').hide();

});

$('#plot').click(function(){
    
    $('#reset').click();

    $('#plot').attr('disabled', 'disabled');

    $('#reset').show();
    $('#plot').css('background-color', '#BDAFC7');
    $("img#plot-result").attr("src", "public/img/ploting.gif");
    $("img#plot-result").removeAttr("width");
    $("img#plot-result").removeAttr("height");


    var variable = $("select[name=variable]").val();
    var typeResult = $("select[name=type-result]").val();
    var levelOption = $("select[name=level-option]").val();

    var typeMap = "NULL";
    if($("select[name=type-map]").length > 0){
        typeMap = $("select[name=type-map]").val();
    }    
    
    var typeWind = 'NULL';
    var timeDate = $("select[name=time-date]").val();
    var fDate = $("#fromDate").val();
    var tDate = $("#toDate").val();
    var minlat = $("#minlat").val();
    var maxlat = $("#maxlat").val();
    var minlon = $("#minlon").val();
    var maxlon = $("#maxlon").val();

    fromDate = standardDate(fDate, timeDate);
    toDate = standardDate(tDate, timeDate);

    // // console.log(fDate + " : " + tDate);
    // console.log(fromDate + " : " + toDate);

    var dataString = variable + "," + typeResult + "," + typeMap + "," + timeDate + "," + fromDate + "," + toDate + "," + minlat + "," + minlon + "," + maxlat + "," + maxlon;

    // console.log(dataString);

    $.ajax({
        type: "POST",
        url: "plot-data",
        dataType: 'json',
        // timeout: 1200000,
        data: {
            'variable' : variable,
            'typeresult' : typeResult,
            'typemap' : typeMap,
            'typewind' : typeWind,
            'typelevel' : levelOption,
            'timeDate' : timeDate,
            'fromDate' : fromDate,
            'toDate' : toDate,
            'minlat' : minlat,
            'minlon' : minlon,
            'maxlat' : maxlat,
            'maxlon' : maxlon,
        },
        success: function(data){
            $("img#plot-result").removeAttr("src");

            var url = data.url;
            var time = data.time;
            
            console.log(data.message);

            if(data.message == "success"){

                pathfolder = data.pathfolder;
                listURL = getListURL(url);

                // console.log(listURL[0]);
                var listTime = getListTime(time);

                if(listTime.length != 0 && listURL.length != 0){

                    if(typeResult == "chart"){
                        $('#dialog-download, #dialog-shopping-card').show();
                    }else{
                        $('#create-animation, #dialog-download, #dialog-shopping-card, #option-time').show();
                    }

                    for(i=1; i<listTime.length; i++){
                        // console.log(listTime[i]);
                        $('#option-time').append("<option id='item' value='"+ (i-1) +"'>"+ listTime[i] +"</option>");
                    }

                    $("img#plot-result").attr("src", listURL[0]);
                    $("img#plot-result").attr("width", "100%");
                    $("img#plot-result").attr("height", "100%");
                    
                }
            }else if(data.message == "fail"){
                $('#not-data').show();
            }
        }
    });
});

$('#reset').click(function() {

    $('#plot').removeAttr('disabled');
    $('#plot').css('background-color', '#844CAF');
    $('#reset, #create-animation, #dialog-download, #dialog-shopping-card, #option-time').hide();
    
    $("img#plot-result").attr("src", "public/img/plot-example.png");
    $("img#plot-result").attr("width", "100%");
    $("img#plot-result").attr("height", "100%");

    $('#option-time').empty();
    $('#list-result-png').empty();
    $('#list-result-filename').empty();
    
    $('#not-data').hide();
});

$('#option-time').change(function() {
    var index = Number($(this).val());
    $("img#plot-result").attr("src", listURL[index]);
    $("img#plot-result").attr("width", "100%");
    $("img#plot-result").attr("height", "100%");
});

function getListURL(link){
    var listURL = [];

    link = link.split('---');
    link.forEach(function(row) {
        // console.log(row);
        var index = row.search('URL=');
        if(index != -1){
            listURL.push(row.substring(index+4, row.length));
        }
    });

    return listURL;
}

function getListTime(time){

    return time.split(',');
}

function standardDate(dates, timedates){
    list = dates.split('-');

    
    if(timedates == 'daily'){
        return list[2] + '-' + list[1] + '-' + list[0]; 
    }else if(timedates == 'monthly'){
        return list[1] + '-' + list[0] + '-01'; 
    }else if(timedates == 'year'){
        return list[0] + '-01-01'; 
    }
}

$('#dialog-download').click(function(){

    // $('#length-list-result-png').val(listURL.length);
    // html = "<input type='checkbox' style='width: 17px' ></input><label style='margin-left: 30px;margin-top: -25px;' >nhietdo.10.6.2012.png</label> <br/>";

    for(i=0; i<listURL.length; i++){
        $('#list-result-png').append("<input value='" +  getNamePng(listURL[i]) + "' name='result-png-" + i + "' type='checkbox' style='width: 17px' ></input><label style='margin-left: 30px;margin-top: -25px;' >"+ getNamePng(listURL[i]) +"</label> <br/>");
    }
});


$('#select-all-result-png').change(function() {
    var checkboxes = $(this).closest('form').find(':checkbox');
    
    if($(this).is(':checked')) {
        checkboxes.prop('checked', true);
    } else {
        checkboxes.prop('checked', false);
    }
});

function getNamePng(key){
     list = key.split('/');

     return list[list.length-1];
}

$('#download-png').click(function(){

    var arrPng = "";
    var namePng = "";

    for(i=0; i<listURL.length; i++){
        $('input:checkbox[name=result-png-' + i + ']:checked').each(function() {
            namePng += $(this).val() + "---";;
            arrPng += listURL[i] + "---";
        });
    }
    // console.log("Name: " + namePng);
    if(arrPng != null){
        
        var path;
        if(pathfolder.indexOf("daily") != -1){
            path = pathfolder.substring(0, pathfolder.length-11);
        }else if(pathfolder.indexOf("monthly") != -1){
            path = pathfolder.substring(0, pathfolder.length-8);
        }
        // console.log("Link: " + path);
        // Link: FTPSite/RSAM/res/meteorological/daily/pr/
        
        var listPath = path.split("/");
        var filename = listPath[listPath.length-3] + "_" + listPath[listPath.length-2];

        console.log(path);

        $.ajax({
            type: "POST",
            url: "home/meteo/download-png",
            dataType: 'json',
            // timeout: 1200000,
            data: {
                'pathfolder' : path,
                'url' : arrPng,
                'name' : namePng,
                'filename' : filename,
            },
            success: function(data){
                if(data.message == "success"){
                    window.location = data.link;
                }else{
                    alert("Bạn phải chọn ít nhất một sản phẩm.");
                }
            }
        });
    }
});

$('#create-animation').click(function(){
    console.log(listURL.length);

    if(listURL.length < 2){
        alert("Phải có ít nhất hai sản phầm.");
    }else{

        var arrPng = "";

        for(i=0; i<listURL.length; i++){
            arrPng += listURL[i] + "---";
        }

        var path;
        if(pathfolder.indexOf("daily") != -1){
            path = pathfolder.substring(0, pathfolder.length-11);
        }else if(pathfolder.indexOf("monthly") != -1){
            path = pathfolder.substring(0, pathfolder.length-8);
        }
        // console.log("Link: " + path);
        // Link: FTPSite/RSAM/res/meteorological/daily/pr/
        
        var listPath = path.split("/");
        var filename = listPath[listPath.length-3] + "_" + listPath[listPath.length-2];

        $.ajax({
            type: "POST",
            url: "home/meteo/create-animation",
            dataType: 'json',
            data: {
                'pathfolder' : path,
                'url' : arrPng,
                'filename' : filename,
            },
            success: function(data){
                if(data.message == "success"){
                    // window.location = data.link;
                    window.open(data.link);
                }else{
                    alert("Bạn chưa tạo ảnh động thành công.");
                }
            }
        });
    }
});

$('#dialog-shopping-card').click(function(){
    
    for(i=0; i<listURL.length; i++){
        var arr = getFileName(listURL[i]);
        $('#list-result-filename').append("<input value='" +  arr[0] + "' name='result-filename-" + i + "' type='checkbox' style='width: 17px' ></input><label style='margin-left: 30px;margin-top: -25px;' >"+ arr[0] +"</label> <br/>");
    }
});

function getFileName(url){

    var arr = [];

    // FTPSite/RSAM/res/meteorological/daily/pr/2012-03-02/png/daily_pr_STS_20120302_shaded_7.0_90.0_30.0_120.0.png
    var list = url.split('/');
    var times = list[list.length-3]; //2012-03-02

    var link = url.substring(0, url.indexOf(times) + 11); // FTPSite/RSAM/res/meteorological/daily/pr/2012-03-02/

    times = times.replace(/-/g, ""); //20120302
    var index = list[list.length-1].indexOf(times);

    var filename = list[list.length-1].substring(0, index + 8) + ".nc"; //daily_pr_STS_20120302

    // console.log("File Name: " + link);
    // console.log("File Name: " + filename);
    arr.push(filename);
    arr.push(link);

    return arr;
}

$('#select-all-result-filename').change(function() {
    var checkboxes = $(this).closest('form').find(':checkbox');
    
    if($(this).is(':checked')) {
        checkboxes.prop('checked', true);
    } else {
        checkboxes.prop('checked', false);
    }
});

$('#add-shopping-card').click(function(){

    var arrFilename = "";
    var filename = "";

    var userId = $('#userId').val();

    for(i=0; i<listURL.length; i++){
        $('input:checkbox[name=result-filename-' + i + ']:checked').each(function() {
            filename = $(this).val() + "---";;
            arrFilename += filename.replace('.nc', '');
        });
    }
    console.log(filename);
    var variable = "";
    if(filename.length > 0){
        var list = filename.split('_');
        variable = list[1];
    }

    console.log("Name: " + variable);
    
    $.ajax({
            type: "POST",
            url: "home/meteo/add-shopping-card",
            dataType: 'json',
            data: {
                'userId' : userId,
                'type-product' : variable,
                'name-product' : arrFilename,
            },
            success: function(data){
                // console.log(data.list);
                if(data.message == "success"){
                    // window.location = data.link;
                    alert("Bạn thêm giỏ hàng thành công.");
                    $('a.close').click();
                }else{
                    alert("Bạn thêm giỏ hàng không thành công.");
                }
            }
        });

});
