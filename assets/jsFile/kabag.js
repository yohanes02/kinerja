var obj = {
	init: function init() {
		this.addListener();
	},
	addListener: function addListener() {
		$("#add-new-criteria").click(function() {
			var lastLength = $("#kriteria-length").val();
			var nowLength = parseInt(lastLength) + 1;

			$("#kriteria-length").val(nowLength);

			var divContainer = $("#div-kriteria-new");

			var divParent = document.createElement('div');
			divParent.id = "kriteria"+nowLength;
			divParent.classList = 'col-md-12 row';
			
			// var divNo = document.createElement('div');
			// divNo.classList.add('col-md-1');
			// var divNoForm = document.createElement('div');
			// divNoForm.classList.add('form-group');
			// divNoForm.classList.add('text-center');
			// var inputTextNo = document.createElement('input');
			// inputTextNo.classList.add('form-control');
			// inputTextNo.classList.add('text-center');
			// inputTextNo.type = "text";
			// inputTextNo.name = "no"+nowLength;
			// inputTextNo.value = nowLength;
			// inputTextNo.disabled = true;
			// divNoForm.append(inputTextNo);
			// divNo.append(divNoForm);

			var divName = document.createElement('div');
			divName.classList.add('col-md-9');
			var divNameForm = document.createElement('div');
			divNameForm.classList.add('form-group');
			divNameForm.classList.add('text-center');
			var inputTextName = document.createElement('input');
			inputTextName.classList.add('form-control');
			inputTextName.type = "text";
			inputTextName.name = "criteria_new_name"+nowLength;
			inputTextName.required = true;
			divNameForm.append(inputTextName);
			divName.append(divNameForm);

			var divBobot = document.createElement('div');
			divBobot.classList.add('col-md-2');
			var divBobotForm = document.createElement('div');
			divBobotForm.classList.add('form-group');
			divBobotForm.classList.add('text-center');
			var inputTextBobot = document.createElement('input');
			inputTextBobot.classList.add('form-control');
			inputTextBobot.type = "number";
			inputTextBobot.name = "criteria_new_rating"+nowLength;
			inputTextBobot.id = "criteria_new_rating"+nowLength;
			inputTextBobot.required = true;
			divBobotForm.append(inputTextBobot);
			divBobot.append(divBobotForm);

			var divClose = document.createElement('div');
			divClose.classList.add('col-md-1');
			divClose.classList.add('pt-2');
			var btnClose = document.createElement('button');
			btnClose.classList.add("close");
			btnClose.type = "button";
			btnClose.setAttribute('onclick', "deleteKriteria('kriteria"+nowLength+"')")
			btnClose.textContent = "x";
			divClose.append(btnClose);

			// divParent.append(divNo);
			divParent.append(divName);
			divParent.append(divBobot);
			divParent.append(divClose);

			divContainer.append(divParent);

		});
		$("#add-new-sub-criteria").click(function() {
			console.log("TESTT");
			var lastLength = $("#kriteria-length").val();
			var nowLength = parseInt(lastLength) + 1;

			$("#kriteria-length").val(nowLength);

			var divContainer = $("#div-sub-kriteria-new");

			var divParent = document.createElement('div');
			divParent.id = "sub-kriteria"+nowLength;
			divParent.classList = 'col-md-12 row';
			
			// var divNo = document.createElement('div');
			// divNo.classList.add('col-md-1');
			// var divNoForm = document.createElement('div');
			// divNoForm.classList.add('form-group');
			// divNoForm.classList.add('text-center');
			// var inputTextNo = document.createElement('input');
			// inputTextNo.classList.add('form-control');
			// inputTextNo.classList.add('text-center');
			// inputTextNo.type = "text";
			// inputTextNo.name = "no"+nowLength;
			// inputTextNo.value = nowLength;
			// inputTextNo.disabled = true;
			// divNoForm.append(inputTextNo);
			// divNo.append(divNoForm);

			var divName = document.createElement('div');
			divName.classList.add('col-md-9');
			var divNameForm = document.createElement('div');
			divNameForm.classList.add('form-group');
			divNameForm.classList.add('text-center');
			var inputTextName = document.createElement('input');
			inputTextName.classList.add('form-control');
			inputTextName.type = "text";
			inputTextName.name = "criteria_new_name"+nowLength;
			inputTextName.required = true;
			divNameForm.append(inputTextName);
			divName.append(divNameForm);

			var divBobot = document.createElement('div');
			divBobot.classList.add('col-md-2');
			var divBobotForm = document.createElement('div');
			divBobotForm.classList.add('form-group');
			divBobotForm.classList.add('text-center');
			var inputTextBobot = document.createElement('input');
			inputTextBobot.classList.add('form-control');
			inputTextBobot.type = "number";
			inputTextBobot.name = "sub_criteria_new_rating"+nowLength;
			inputTextBobot.id = "sub_criteria_new_rating"+nowLength;
			inputTextBobot.required = true;
			divBobotForm.append(inputTextBobot);
			divBobot.append(divBobotForm);

			var divClose = document.createElement('div');
			divClose.classList.add('col-md-1');
			divClose.classList.add('pt-2');
			var btnClose = document.createElement('button');
			btnClose.classList.add("close");
			btnClose.type = "button";
			btnClose.setAttribute('onclick', "deleteSubKriteria('sub-kriteria"+nowLength+"')")
			btnClose.textContent = "x";
			divClose.append(btnClose);

			// divParent.append(divNo);
			divParent.append(divName);
			divParent.append(divBobot);
			divParent.append(divClose);

			divContainer.append(divParent);

		});
		$("#button-edit-kriteria").click(function() {
			console.log("TEST");
			var lengthKritria = parseInt($("#kriteria-length-edit").text());
			var jmlBobot = 0;
			for (let i = 0; i < lengthKritria; i++) {
				jmlBobot += parseInt($("#criteria_rating"+i).val());
				console.log(jmlBobot);
			}

			if(jmlBobot > 100) {
				alert("Jumlah nilai bobot tidak boleh lebih dari 100");
				return;
			}

			$("#submit-edit-kriteria").click();
		});
		$("#button-new-kriteria").click(function() {
			console.log("TEST");
			var lengthKritria = parseInt($("#kriteria-length").val());
			var jmlBobot = 0;
			for (let i = 1; i <= lengthKritria; i++) {
				if($("#criteria_new_rating"+i).length != 0) {
					jmlBobot += parseInt($("#criteria_new_rating"+i).val());
				}
			}

			if(jmlBobot > 100) {
				alert("Jumlah nilai bobot tidak boleh lebih dari 100");
				return;
			}

			$("#submit-new-kriteria").click();
		});
		$("#button-update-sub").click(function() {
			var lengthKritria = parseInt($("#sub-kriteria-length-edit").val());
			// console.log(lengthKritria, $("#sub-kriteria-length-edit").text());
			// var jmlBobot = 0;
			for (let i = 0; i < lengthKritria; i++) {
				var bobot = parseInt($("#sub-criteria-rating"+i).val());
				console.log(bobot);
				if(bobot > 100) {
					alert("Nilai bobot tidak boleh lebih dari 100");
					return;
				}
			}

			$("#submit-update-sub").click();
		});
		$("#button-new-sub").click(function() {
			console.log("TEST");
			var lengthKritria = parseInt($("#kriteria-length").val());
			var bobot = 0;
			for (let i = 1; i <= lengthKritria; i++) {
				if($("#sub_criteria_new_rating"+i).length != 0) {
					bobot = parseInt($("#sub_criteria_new_rating"+i).val());
				}
				if(bobot > 100) {
					alert("Nilai bobot tidak boleh lebih dari 100");
					return;
				}
			}

			$("#submit-new-sub").click();
		});
	}	
}

$(document).ready(function() {obj.init()});

function editKriteria(id, name) {
	$("#id-kriteria-edit").val(id);
	$("#kriteria-name").val(name);
}

function deleteKriteria(idDiv) {
	$("#"+idDiv).remove();
}

function deleteSubKriteria(idDiv) {
	$("#"+idDiv).remove();
}
