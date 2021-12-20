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

		})
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
