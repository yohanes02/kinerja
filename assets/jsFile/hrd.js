function gantiPassword(id) {
	$("#id-user").val(id);
}

function deleteKaryawan(id) {
	$("#id-karyawan-delete").val(id);
}

function deleteUser(id) {
	$("#id-user-delete").val(id);
}

function editUser(id, username, email, tipe, departemen = null) {
	$("#id-user-edit").val(id);
	$("#username").val(username);
	$("#user-email").val(email);
	$("#tipe_user_edit").val(tipe);
	if (tipe != "2") {
		$("#departemen-select-edit").hide();
	} else {
		$("#departemen-select-edit").show();
		if(departemen != null) {
			console.log("NOT NULL");
			$("#departemen-edit").val(departemen);
		}
	}
}

function editBagian(id, name) {
	$("#id-bagian-edit").val(id);
	$("#bagian-name").val(name);
}

function deleteBagian(id) {
	$("#id-bagian-delete").val(id);
}

function toggleAdd() {
	if ($("#parent-add").is(":visible")) {
		$("#parent-add").hide();
	} else {
		$("#parent-add").show();
	}
}

function showAdd() {
	$("#parent-add").show();
}

function checkUserTypeNew() {
	$value = $("#tipe_user_new").val();
	if($value == "2") {
		$("#departemen-select-new").show();
	} else {
		$("#departemen-select-new").hide();
	}
}

function checkUserTypeEdit() {
	$value = $("#tipe_user_edit").val();
	if($value == "2") {
		$("#departemen-select-edit").show();
	} else {
		$("#departemen-select-edit").hide();
	}
}
