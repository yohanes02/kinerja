function toKaryawan() {
    if($("#login-all").show()) {
        $("#login-all").hide()
    }

    if($("#login-karyawan").hide()) {
        $("#login-karyawan").show()
    }
}

function toUser() {
    if($("#login-karyawan").show()) {
        $("#login-karyawan").hide()
    }

    if($("#login-all").hide()) {
        $("#login-all").show()
    }
}