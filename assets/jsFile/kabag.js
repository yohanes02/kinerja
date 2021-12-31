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
		$("#get-riwayat").click(function() {
			console.log('click');
			var startMonth = new Date($("#month-rating-start").val()).getMonth()+1;
			var endMonth = new Date($("#month-rating-end").val()).getMonth()+1;
			// var startMonth = parseInt($("#month-rating-start").val());
			// var endMonth = parseInt($("#month-rating-end").val());
			// var startMonth = 9;
			// var endMonth = 1;
			var startYear = new Date($("#month-rating-start").val()).getFullYear();
			var endYear = new Date($("#month-rating-end").val()).getFullYear();
			var arrMonth = [];
			var arrYear = [];

			if (startYear != endYear) {
				for (let ii = startMonth; ii <= 12; ii++) {
					arrMonth.push(ii);
					arrYear.push(startYear);
				}
				for (let iii = 1; iii <= endMonth; iii++) {
					arrMonth.push(iii);					
					arrYear.push(endYear);					
				}
			} else {
				for (let idx = startMonth; idx <= endMonth; idx++) {
					arrMonth.push(idx);
					arrYear.push(startYear);
				}
			}
			console.log(arrMonth);
			console.log(arrYear);
			
			var post = {
				months: arrMonth,
				years: arrYear,
				employee: $("#employee-id").val(),
			};

			console.log(arrMonth);
			console.log(arrYear);
			
			var dataPost = JSON.stringify(post);

			$.ajax({
				type: "post",
				url: "getRiwayat",
				dataType: "JSON",
				data: dataPost,
				traditional: true,
				success: function (data) {
					monthsArr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',  'October', 'November', 'December'];
					$("#parent-riwayat").empty();
					var parent = document.getElementById('parent-riwayat');

					var idx = 0;
					data.forEach(e => {
						var divParent = document.createElement('div');
						divParent.classList.add('pd-20');
						divParent.classList.add('card-box');
						divParent.classList.add('mb-30');
						
						var divTitle = document.createElement('div');
						divTitle.classList.add('clearfix');
						divTitle.classList.add('mb-20');
						var divTitleRow = document.createElement('div');
						divTitleRow.classList.add('row');
						var divTitleRowCol = document.createElement('div');
						divTitleRowCol.classList.add('col-md-9');
						var h4 = document.createElement('h4');
						h4.innerHTML = 'Penilaian Bulan '+ monthsArr[arrMonth[idx]-1] + ' ' + arrYear[idx];
						divTitleRowCol.append(h4);
						divTitleRow.append(divTitleRowCol);
						divTitle.append(divTitleRow);
	
						var divTable = document.createElement('div');
						divTable.classList.add('table-responsive');
						var tableParent = document.createElement('table');
						tableParent.classList.add('table');
						tableParent.classList.add('table-stripped');
						var thead = document.createElement('thead');
						var tr = document.createElement('tr');
						var th = document.createElement('th');
						th.innerHTML = 'Nama Karyawan';
						tr.append(th);
						console.log(e);
						if(e.length != 0) {
							e[0].cr.forEach((f, idx) => {
								var th1 = document.createElement('th');
								th1.innerHTML = 'K'+(idx+1);
								tr.append(th1);
							})
							var th2 = document.createElement('th');
							th2.innerHTML = 'Result';
							tr.append(th2);
							thead.append(tr);
							tableParent.append(thead);
							
						}
						
						var tbody = document.createElement('tbody');
						
						if(e.length != 0) {
							for (let idx = 0; idx < e.length; idx++) {
								var tr1 = document.createElement('tr');
								var td = document.createElement('td');
								td.innerHTML = e[idx].k_name;
								tr1.append(td);
								for (let i = 0; i < e[idx].cr.length; i++) {
									var td1 = document.createElement('td');
									td1.innerHTML = e[idx].cr[i][1];
									tr1.append(td1);
								}					
								var td2 = document.createElement('td');
								td2.innerHTML = e[idx].result;			
								tr1.append(td2);
								tbody.append(tr1);
							}

							tableParent.append(tbody);
						}
						
						
						if(e.length == 0) {
							var p = document.createElement('p');
							p.innerHTML = 'Tidak ada penilaian';
							divTable.append(p);
						} else {
							divTable.append(tableParent);
						}

						divParent.append(divTitle);
						divParent.append(divTable);
						
						parent.append(divParent);
						idx++;
					});
				}
			});
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
