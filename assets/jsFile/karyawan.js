function updateStatus(id, index) {
    var post = {
        id_pekerjaan: id,
        status_pekerjaan : $("#status"+index).val()
    };

    console.log(post);

    var dataPost = JSON.stringify(post);

    $.ajax({
        type: "post",
        url: "update_pekerjaan",
        dataType: "JSON",
        data: dataPost,
        traditional: true,
        success: function (date) {
            console.log("DONE");
        }
    });
}

function lihatPekerjaan(karyawanId) {
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
        createTablePastMonth(month, year, karyawanId);
        $("#current-month").hide();
        $("#past-month").show();
        $("#p-past-month").text('Bulan: ' + $("#month-year-pekerjaan").val());
    }
}

function createTablePastMonth(month, year, karyawanId) {
    var post = {
        month: month,
        year: year,
        karyawan_id: karyawanId,
    }

    var dataPost = JSON.stringify(post);
    $.ajax({
        type: "post",
        url: "getPekerjaan",
        dataType: "JSON",
        data: dataPost,
        traditional: true,
        success: function (data) {
            // console.log(data);
            $('#body-past-month').empty();
            var parent = document.getElementById('body-past-month');
            parent
            
            var idx = 0;
            data.forEach(el => {
                var tr = document.createElement('tr');
                for (let i = 0; i < 3; i++) {
                    var text = '';
                    var bgColor = 'transparent';
                    var width = '5%';
                    if(i == 0) {
                        text = idx+1;
                    }
                    if(i == 1) {
                        text = el.description;
                        width = '75%';
                    }
                    if(i == 2) {
                        width = '20%';
                        if (el.status == 1) {
                            text = 'Menunggu Dikerjakan';                            
                        } else if (el.status == 2) {
                            text = 'Sedang Dikerjakan';
                        } else {
                            text = 'Selesai';
                            bgColor = 'lightgreen';
                        }
                    }
                    if (i == 2) {
                        var td = document.createElement('td');
                        // td.style.backgroundColor = bgColor;
                        td.setAttribute("width", width);
                        var select = document.createElement('select');
                        select.classList.add('form-control');
                        select.classList.add('custom-select');
                        select.setAttribute('disabled', 'disabled');
                        select.style.backgroundColor = bgColor;
                        var option = document.createElement('option');
                        option.setAttribute('selected', 'selected');
                        option.innerHTML = text;
                        select.append(option);
                        td.append(select);
                    } else {
                        var td = document.createElement('td');
                        td.style.backgroundColor = bgColor;
                        td.setAttribute("width", width);
                        td.innerHTML = text;
                    }

                    tr.append(td);
                }
                parent.append(tr);
                idx++;
            });
        }
    })

    
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