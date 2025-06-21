function getdistrict() {
    var statecode = $("#state").val();
    $.ajax({
        url: "ajax/statecode.php",
        method: "POST",
        data: {
            scode: statecode
        },
        success: function(data) {
            $('#district').empty();
            $('#district').append(data);
            //hospitallist('state',statecode)
        }
    });
}

function hospitallist(col,val){
    const state = $('#state').val();
    const district = $('#district').val();

    if(state == ""){
        alert("Choose State");
        return;
    }
    
    if(district == ""){
        alert("Choose District");
        return;
    }
    if(val == ""){
        alert("Choose Something");
        return;
    }
    $.ajax({
        url: "ajax/hospital_list.php",
        method: "POST",
        data: {state:state,district:district, col: col, val: val },
        success: function(data) {
            //console.log(data);
            $('#hospitallist').empty();
            $('#hospitallist').append(data);
        }
    });
}



