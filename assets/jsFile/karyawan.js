function updateStatus(id, index) {
    var post = {
        id_pekerjaan: id,
        status_pekerjaan : $("#status"+index).val()
    };

    console.log(post);

    // var dataPost = JSON.stringify(post);

    // $.ajax({
    //     type: "post",
    //     url: "update_pekerjaan",
    //     dataType: "JSON",
    //     data: dataPost,
    //     traditional: true,
    //     success: function (date) {
    //         console.log("DONE");
    //     }
    // })
}

function lihatPekerjaan() {
    var date = $("#month-year-pekerjaan").val().split(" ");
    var dateVal = date[1] + '-' + getMonth(date[0]);
    var month = new Date(dateVal).getMonth() + 1;
    var year = new Date(dateVal).getFullYear();

    var dateSelected = month + '-' + year;
    var dateNow = new Date().getMonth() + 1 + '-' + new Date().getFullYear();

    if (dateSelected == dateNow) {
        $("#current-month").show();
        $("#past-month").hide();
    } else {
        $("#current-month").hide();
        $("#past-month").show();
        $("#p-past-month").text('Bulan: ' + $("#month-year-pekerjaan").val());
    }
}

function getMonth(month) {
    var intMonth;
    switch (month) {
        case 'January':
            intMonth = 1;
            break;
        case 'February':
            intMonth = 2;
            break;
        case 'March':
            intMonth = 3;
            break;
        case 'April':
            intMonth = 4;
            break;	
        case 'May':
            intMonth = 5;
            break;
        case 'Juny':
            intMonth = 6;
            break;
        case 'July':
            intMonth = 7;
            break;
        case 'August':
            intMonth = 8;
            break;
        case 'September':
            intMonth = 9;
            break;
        case 'October':
            intMonth = 10;
            break;
        case 'November':
            intMonth = 11;
            break;	
        default:
            intMonth = 12;
            break;
    }
    return intMonth;
}