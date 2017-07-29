$('#position_suburb').click(function () {
    console.log('clicked');
    if($('#position_suburb_show').is(":visible")){
        $('#position_suburb_show').hide();
    }
    else{
        $('#position_suburb_show').show();
    }
});

$('#compare_yourself').click(function () {
    console.log('clicked');
    if($('#compare_yourself_show').is(":visible")){
        $('#compare_yourself_show').hide();
    }
    else{
        $('#compare_yourself_show').show();
    }
});

$('#show_table').click(function() {
    if($('#table2').is(":visible")){
        $('#table2').hide();
    }
    else{
        $('#table2').show();
    }
});