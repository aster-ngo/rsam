
$(document).ready(function(){

  dailyDate();

  process();

});

function process(){
  $html = "<div id='div-date-time' ><span id='add-from-date' ></span><label id='label-time' style='color: black;margin-left: 10px;'>Thời gian từ:</label> <br/><input type='text' id='fromDate' class='fromDate time' name='fromDate' ><br/> <label id='label-time' style='color: black;margin-left: 10px;'>Thời gian đến:</label> <br/><span id='add-to-date' ></span><input type='text' id='toDate' class='toDate time' name='toDate' ><br/></div>";

  $('#time-date').change(function() {

    $('#fromDate, #toDate').val("");
    $('#div-date-time').remove();

    $('#div-add-date-time').append($html);

    var value = $(this).val();

    if(value == "daily"){
      $('#fromDate, #toDate').attr('placeholder', 'dd-mm-yyyy');
      dailyDate();

    }else if(value == "monthly"){
      $('#fromDate, #toDate').attr('placeholder', 'mm-yyyy');
      monthlyDate();

    }else if(value == "year"){
      $('#fromDate, #toDate').attr('placeholder', 'yyyy');
      yearDate();

    }
  });
};

function dailyDate() {
  $( "#fromDate" ).datepicker({
    // showOn: "button",
    // buttonImage: "{{ asset('public/img/calendar.gif') }}",
    // buttonImageOnly: true,
    // buttonText: "Chọn thời gian",

    dateFormat: 'dd-mm-yy',
    defaultDate: "+1w",
    changeMonth: true,
    changeYear: true,
    onClose: function( selected) {
      $( "#toDate" ).datepicker( "option", "minDate", selected);
      $( "#toDate" ).datepicker( "option", "minMonth", selected);
    }
  });

  $( "#toDate" ).datepicker({
    // showOn: "button",
    // buttonImage: "{{ asset('public/img/calendar.gif') }}",
    // buttonImageOnly: true,
    // buttonText: "Chọn thời gian",

    dateFormat: 'dd-mm-yy',
    defaultDate: "+1w",
    // changeMonth: true,
    // changeYear: true,
    onClose: function( selected) {
      /*$( "#fromDate" ).datepicker( "option", "maxDate", selected);*/
      $( "#fromDate" ).datepicker( "option", "maxMonth", selected);
    }
  });
};

function monthlyDate() {

  var year;

  $( "#fromDate" ).datepicker({
    // showOn: "button",
    // buttonImage: "{{ asset('public/img/calendar.gif') }}",
    // buttonImageOnly: true,
    // buttonText: "Chọn thời gian",

    dateFormat: 'mm-yy',
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    onClose: function(dateText, inst, selected) { 
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(year, month, 1));
        // $( "#toDate" ).datepicker( "option", "minMonth", selected);
        // $( "#toDate" ).datepicker('setDate', new Date(year, month, 1));

    }

  });

  $( "#toDate" ).datepicker({
    // showOn: "button",
    // buttonImage: "{{ asset('public/img/calendar.gif') }}",
    // buttonImageOnly: true,
    // buttonText: "Chọn thời gian",

    dateFormat: 'mm-yy',
    changeMonth: true,
    // changeYear: true,
    showButtonPanel: true,
    onClose: function(dateText, inst, selected) { 
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        
        $(this).datepicker('setDate', new Date(year, month, 1));

        // $( "#fromDate" ).datepicker( "option", "maxMonth", selected);
    }
    
  });

  $("#fromDate").focus(function () {
      $(".ui-datepicker-calendar").hide();
      $("#ui-datepicker-div").position({
          my: "center top",
          at: "center bottom",
          of: $(this)
      });
  });
  $("#toDate").focus(function () {
      $(".ui-datepicker-calendar, .ui-datepicker-year").hide();
      $("#ui-datepicker-div").position({
          my: "center top",
          at: "center bottom",
          of: $(this)
      });
  });
};

function yearDate() {


  $( "#fromDate" ).datepicker({
    // showOn: "button",
    // buttonImage: "{{ asset('public/img/calendar.gif') }}",
    // buttonImageOnly: true,
    // buttonText: "Chọn thời gian",

    dateFormat: 'yy',
    // changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    onClose: function(dateText, inst, selected) { 
        
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(year, 1, 1));
        // $( "#toDate" ).datepicker( "option", "minMonth", selected);
    }

  });

  $( "#toDate" ).datepicker({
    
    dateFormat: 'yy',
    // changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    onClose: function(dateText, inst, selected) { 
        // var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();

        $(this).datepicker('setDate', new Date(year, 1, 1));

        // $( "#fromDate" ).datepicker( "option", "maxMonth", selected);
    }
    
  });

  $("#fromDate, #toDate").focus(function () {
      $(".ui-datepicker-calendar, .ui-datepicker-month").hide();
      $("#ui-datepicker-div").position({
          my: "center top",
          at: "center bottom",
          of: $(this)
      });
  });
};
