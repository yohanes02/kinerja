var obj = {
	init: function init() {
		this.generateChart();
		this.addListener();
	},
	addListener: function addListener() {
		var _this = this;
		// var idActive = $("#departemen-select").val();
		// $("#add-new-criteria-"+idActive).click(function() {
		// 	var lastLength = $("#kriteria-length-"+idActive).val();
		// 	var nowLength = parseInt(lastLength) + 1;

		// 	$("#kriteria-length-"+idActive).val(nowLength);

		// 	var divContainer = $("#div-kriteria-new-"+idActive);

		// 	var divParent = document.createElement('div');
		// 	divParent.id = "kriteria"+nowLength+"-"+idActive;
		// 	divParent.classList = 'col-md-12 row';

		// 	var divName = document.createElement('div');
		// 	divName.classList.add('col-md-9');
		// 	var divNameForm = document.createElement('div');
		// 	divNameForm.classList.add('form-group');
		// 	divNameForm.classList.add('text-center');
		// 	var inputTextName = document.createElement('input');
		// 	inputTextName.classList.add('form-control');
		// 	inputTextName.type = "text";
		// 	inputTextName.name = "criteria_new_name"+nowLength;
		// 	inputTextName.required = true;
		// 	divNameForm.append(inputTextName);
		// 	divName.append(divNameForm);

		// 	var divBobot = document.createElement('div');
		// 	divBobot.classList.add('col-md-2');
		// 	var divBobotForm = document.createElement('div');
		// 	divBobotForm.classList.add('form-group');
		// 	divBobotForm.classList.add('text-center');
		// 	var inputTextBobot = document.createElement('input');
		// 	inputTextBobot.classList.add('form-control');
		// 	inputTextBobot.type = "number";
		// 	inputTextBobot.name = "criteria_new_rating"+nowLength;
		// 	inputTextBobot.id = "criteria_new_rating"+nowLength+"-"+idActive;
		// 	inputTextBobot.required = true;
		// 	divBobotForm.append(inputTextBobot);
		// 	divBobot.append(divBobotForm);

		// 	var divClose = document.createElement('div');
		// 	divClose.classList.add('col-md-1');
		// 	divClose.classList.add('pt-2');
		// 	var btnClose = document.createElement('button');
		// 	btnClose.classList.add("close");
		// 	btnClose.type = "button";
		// 	btnClose.setAttribute('onclick', "deleteKriteria('kriteria"+nowLength+"')")
		// 	btnClose.textContent = "x";
		// 	divClose.append(btnClose);

		// 	// divParent.append(divNo);
		// 	divParent.append(divName);
		// 	divParent.append(divBobot);
		// 	divParent.append(divClose);

		// 	divContainer.append(divParent);

		// });
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
		$("#get-riwayat").click(function () {
			var department = $("#department-id").val();
			var employee = $("#employee-id").val();
			// var startMonth = new Date($("#month-rating-start").val()).getMonth() + 1;
			// var endMonth = new Date($("#month-rating-end").val()).getMonth() + 1;
			// var startMonth = moment($("#month-rating-start").val()).format("M");
			// var endMonth = moment($("#month-rating-end").val()).format("M");
			// var startYear = new Date($("#month-rating-start").val()).getFullYear();
			// var endYear = new Date($("#month-rating-end").val()).getFullYear();
			var splitStart = $("#month-rating-start").val().split(" ");
			var startVal = splitStart[1] + '-' +_this.getMonth(splitStart[0]);
			var splitEnd = $("#month-rating-end").val().split(" ");
			var endVal = splitEnd[1] + '-' +_this.getMonth(splitEnd[0]);
			var startMonth = new Date(startVal).getMonth() + 1;
			var endMonth = new Date(endVal).getMonth() + 1;
			var startYear = new Date(startVal).getFullYear();
			var endYear = new Date(endVal).getFullYear();
			var arrMonth = [];
			var arrYear = [];

			console.log(startMonth, endMonth, startYear, endYear);

			$arrTempYear = [];
			for (let iiii = startYear; iiii <= endYear; iiii++) {
				$arrTempYear.push(iiii);
			}

			console.log($arrTempYear);

			if (startYear != endYear) {
				for (let iiiii = 0; iiiii < $arrTempYear.length; iiiii++) {
					if($arrTempYear[iiiii] == startYear) {
						for (let ii = startMonth; ii <= 12; ii++) {
							arrMonth.push(ii);
							arrYear.push(startYear);
						}
					}

					else if($arrTempYear[iiiii] == $arrTempYear[$arrTempYear.length - 1]) {
						for (let iii = 1; iii <= endMonth; iii++) {
							arrMonth.push(iii);
							arrYear.push(endYear);
						}
					} else {
						for (let iiiiii = 1; iiiiii <= 12; iiiiii++) {
							arrMonth.push(iiiiii);
							arrYear.push($arrTempYear[iiiii]);
						}
					}

					
				}
				// for (let ii = startMonth; ii <= 12; ii++) {
				// 	arrMonth.push(ii);
				// 	arrYear.push(startYear);
				// }
				// for (let iii = 1; iii <= endMonth; iii++) {
				// 	arrMonth.push(iii);
				// 	arrYear.push(endYear);
				// }
			} else {
				for (let idx = startMonth; idx <= endMonth; idx++) {
					arrMonth.push(idx);
					arrYear.push(startYear);
				}
			}

			var post = {
				months: arrMonth,
				years: arrYear,
				employee: employee,
				department: department,
			};

			console.log(post);

			var dataPost = JSON.stringify(post);

			$.ajax({
				type: "post",
				url: "getPenilaian",
				dataType: "JSON",
				data: dataPost,
				traditional: true,
				success: function (data) {
					console.log(data);
					if(department == "all" && employee == "all") {
						var div = document.getElementById('parent-many');
						var div2 = document.getElementById('parent-single');
						div.style.display = 'block'
						div2.style.display = 'none'
						data.forEach((e, idx) => {
							// if(department == "all") {
								console.log("dept" + idx);
								_this.createDivDepartments("dept" + idx, e.data, e.dept_criteria, arrMonth, arrYear);
							// } else {
							// }
						});
					} else {
						var div = document.getElementById('parent-many');
						var div2 = document.getElementById('parent-single');
						div.style.display = 'none'
						div2.style.display = 'block'
						_this.createDivDepartment(data, arrMonth, arrYear);
					}
				},
			});
		});
		$("#department-id").change(function () {
			
			if($("#department-id").val() == "all") {
				var employees = document.getElementById("employee-id"),employee,i;
		
				for (i = 0; i < employees.length; i++) {
					employee = employees[i];
					// if (employees_id.includes(employee.value) == false) {
					// 	employee.style.display = "none";
					// } else {
						employee.style.display = "block";
					// }
				}
			} else {
				var post = {
					dept_id: parseInt($("#department-id").val())
				};
	
				console.log(post);
	
				var dataPost = JSON.stringify(post);
	
				$.ajax({
					type: "post",
					url: "getEmployeeByDept",
					dataType: "JSON",
					data: dataPost,
					traditional: true,
					success: function (data) {
						console.log(data);
						var employees_id = [];
						data.forEach(e => {
							employees_id.push(e.id);
						});
	
						var employees = document.getElementById("employee-id"),employee,i;
			
						for (i = 1; i < employees.length; i++) {
							employee = employees[i];
							if (employees_id.includes(employee.value) == false) {
								employee.style.display = "none";
							} else {
								employee.style.display = "block";
							}
						}
						
					},
				});			
			}


		});
	},
	getMonth(month) {
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
	},
	createDivDepartments: function createDivDepartment(
		id,
		data,
		dataDept,
		arrMonth,
		arrYear
	) {
		monthsArr = [
			"January",
			"February",
			"March",
			"April",
			"May",
			"June",
			"July",
			"August",
			"September",
			"October",
			"November",
			"December",
		];
		// var parent = document.getElementById('parent-riwayat');
		$('#'+id).empty();
		var parent = document.getElementById(id);

		var divCard = document.createElement('div');
		divCard.classList.add('my-2');
		divCard.classList.add('card');
		var divCardHeader = document.createElement('div');
		divCardHeader.classList.add('card-header');
		divCardHeader.setAttribute('style', 'padding: 0.3rem');
		var btn = document.createElement('button');
		btn.classList.add('btn');
		btn.classList.add('btn-block');
		btn.setAttribute('data-toggle', 'collapse');
		btn.setAttribute('data-target', '#info');
		btn.setAttribute('style', 'text-align: left; font-weight: bolder');
		btn.innerHTML = "Info Kriteria Penilaian"
		divCardHeader.append(btn);
		
		var divInfo = document.createElement('div');
		divInfo.classList.add('collapse');
		divInfo.classList.add('show');
		divInfo.setAttribute('id', 'info');
		var divCardBody = document.createElement('div');
		divCardBody.classList.add('card-body');
		var h4 = document.createElement('h4');
		h4.innerHTML = 'Kriteria Penilaian';
		divCardBody.append(h4);
		
		dataDept.forEach((el, idx) => {
			var divSpan = document.createElement('div');
			var span = document.createElement('span');
			span.innerHTML = "K"+(idx+1)+' : ';
			var span2 = document.createElement('span');
			span2.innerHTML = el;
			divSpan.append(span);
			divSpan.append(span2);

			divCardBody.append(divSpan);
		});
		
		divInfo.append(divCardBody);
		
		divCard.append(divCardHeader);
		divCard.append(divInfo);
		
		parent.append(divCard) 

		var idx = 0;
		data.forEach((e) => {
			var divParent = document.createElement("div");
			divParent.classList.add("pd-20");
			divParent.classList.add("card-box");
			divParent.classList.add("mb-30");

			var divTitle = document.createElement("div");
			divTitle.classList.add("clearfix");
			divTitle.classList.add("mb-20");
			var divTitleRow = document.createElement("div");
			divTitleRow.classList.add("row");
			var divTitleRowCol = document.createElement("div");
			divTitleRowCol.classList.add("col-md-9");
			var h4 = document.createElement("h4");
			h4.innerHTML =
				"Penilaian Bulan " + monthsArr[arrMonth[idx] - 1] + " " + arrYear[idx];
			divTitleRowCol.append(h4);
			divTitleRow.append(divTitleRowCol);
			divTitle.append(divTitleRow);

			var divTable = document.createElement("div");
			divTable.classList.add("table-responsive");
			var tableParent = document.createElement("table");
			tableParent.classList.add("table");
			tableParent.classList.add("table-stripped");
			var thead = document.createElement("thead");
			var tr = document.createElement("tr");
			var th = document.createElement("th");
			th.style.verticalAlign = 'middle';
			// th.style.textAlign = 'center';
			th.innerHTML = "Nama Karyawan";
			tr.append(th);
			console.log(e);
			if (e.length != 0) {
				e[0].cr.forEach((f, idx) => {
					var th1 = document.createElement("th");
					th1.setAttribute('data-toggle', 'tooltip');
					th1.setAttribute('data-placement', 'top');
					th1.style.verticalAlign = 'middle';
					// th1.style.textAlign = 'center';
					th1.title = e[0]['cr'][idx][3];
					th1.innerHTML = e[0]['cr'][idx][3] + ' (K' + (idx+1) + ')';
					// th1.innerHTML = "K" + (idx + 1);
					tr.append(th1);
				});
				var th2 = document.createElement("th");
				th2.style.verticalAlign = 'middle';
				// th2.style.textAlign = 'center';
				th2.innerHTML = "Hasil";
				var th3 = document.createElement('th');
				th3.style.verticalAlign = 'middle';
				th3.innerHTML = 'Indeks';
				tr.append(th3);
				tr.append(th2);
				thead.append(tr);
				tableParent.append(thead);
			}

			var tbody = document.createElement("tbody");

			if (e.length != 0) {
				for (let idx = 0; idx < e.length; idx++) {
					var tr1 = document.createElement("tr");
					var td = document.createElement("td");
					td.innerHTML = e[idx].k_name;
					tr1.append(td);
					for (let i = 0; i < e[idx].cr.length; i++) {
						var td1 = document.createElement("td");
						td1.innerHTML = e[idx].cr[i][1];
						tr1.append(td1);
					}
					var td2 = document.createElement("td");
					var resultText;
					if(1-e[idx].result >= 0.80) {
						resultText = 'Sangat Baik';
					} else if(1-e[idx].result >= 0.65) {
						resultText = 'Baik';
					} else if(1-e[idx].result >= 0.50) {
						resultText = 'Cukup';
					} else if(1-e[idx].result < 0.50 && 1-e[idx].result >= 40) {
						resultText = 'Kurang';
					} else {
						resultText = 'Sangat Kurang';
					}
					// td2.innerHTML = resultText + " (" + e[idx].result + ")";			
					// td2.innerHTML = e[idx].result;
					td2.innerHTML = resultText;			
					td2.style.fontWeight = 'bold';
					var td3 = document.createElement('td');
					td3.innerHTML = e[idx].result;
					tr1.append(td3);
					tr1.append(td2);
					tbody.append(tr1);
				}

				tableParent.append(tbody);
			}

			if (e.length == 0) {
				var p = document.createElement("p");
				p.innerHTML = "Tidak ada penilaian";
				divTable.append(p);
			} else {
				divTable.append(tableParent);
			}

			divParent.append(divTitle);
			divParent.append(divTable);

			parent.append(divParent);
			idx++;
		});
	},
	createDivDepartment: function createDivDepartment(
		data,
		arrMonth,
		arrYear
	) {
		monthsArr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',  'October', 'November', 'December'];
		$("#parent-single").empty();
		var parent = document.getElementById('parent-single');

		var divCard = document.createElement('div');
		divCard.classList.add('my-2');
		divCard.classList.add('card');
		var divCardHeader = document.createElement('div');
		divCardHeader.classList.add('card-header');
		divCardHeader.setAttribute('style', 'padding: 0.3rem');
		var btn = document.createElement('button');
		btn.classList.add('btn');
		btn.classList.add('btn-block');
		btn.setAttribute('data-toggle', 'collapse');
		btn.setAttribute('data-target', '#info');
		btn.setAttribute('style', 'text-align: left; font-weight: bolder');
		btn.innerHTML = "Info Kriteria Penilaian"
		divCardHeader.append(btn);

		var divInfo = document.createElement('div');
		divInfo.classList.add('collapse');
		divInfo.classList.add('show');
		divInfo.setAttribute('id', 'info');
		var divCardBody = document.createElement('div');
		divCardBody.classList.add('card-body');
		var h4 = document.createElement('h4');
		h4.innerHTML = 'Kriteria Penilaian';
		divCardBody.append(h4);

		data.dept_criteria.forEach((e, idx) => {
			var divSpan = document.createElement('div');
			var span = document.createElement('span');
			span.innerHTML = "K"+(idx+1)+' : ';
			var span2 = document.createElement('span');
			span2.innerHTML = e;
			divSpan.append(span);
			divSpan.append(span2);

			divCardBody.append(divSpan);
	});

		divInfo.append(divCardBody);
			
		divCard.append(divCardHeader);
		divCard.append(divInfo);

		parent.append(divCard);

		var idx = 0;
		data.data.forEach(e => {
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
			th.style.verticalAlign = 'middle';
			// th.style.textAlign = 'center';
			th.innerHTML = 'Nama Karyawan';
			tr.append(th);
			console.log(e);
			if(e.length != 0) {
				e[0].cr.forEach((f, idx) => {
					var th1 = document.createElement('th');
					th1.setAttribute('data-toggle', 'tooltip');
					th1.setAttribute('data-placement', 'top');
					th1.style.verticalAlign = 'middle';
					// th1.style.textAlign = 'center';
					th1.title = e[0]['cr'][idx][3];
					th1.innerHTML = e[0]['cr'][idx][3] + ' (K' + (idx+1) + ')';
					// th1.innerHTML = 'K'+(idx+1);
					tr.append(th1);
				})
				var th2 = document.createElement('th');
				th2.style.verticalAlign = 'middle';
				// th2.style.textAlign = 'center';
				th2.innerHTML = 'Hasil';
				var th3 = document.createElement('th');
				th3.style.verticalAlign = 'middle';
				th3.innerHTML = 'Indeks';
				tr.append(th3);
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
					var resultText;
					if(1-e[idx].result >= 0.80) {
						resultText = 'Sangat Baik';
					} else if(1-e[idx].result >= 0.65) {
						resultText = 'Baik';
					} else if(1-e[idx].result >= 0.50) {
						resultText = 'Cukup';
					} else if(1-e[idx].result < 0.50 && 1-e[idx].result >= 40) {
						resultText = 'Kurang';
					} else {
						resultText = 'Sangat Kurang';
					}
					// td2.innerHTML = resultText + " (" + e[idx].result + ")";	
					// td2.innerHTML = e[idx].result;	
					td2.innerHTML = resultText;	
					td2.style.fontWeight = 'bold';
					var td3 = document.createElement('td');
					td3.innerHTML = e[idx].result;
					tr1.append(td3);		
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
	},
	generateChart: function generateChart() {
		this.chartGenderBarByBagian();
		this.chartGenderPie();
	},
	chartGenderPie: function chartGender() {
		$.ajax({
			type: "ajax",
			url: "hrd/getEmployeeByGender",
			dataType: "JSON",
			success: function (data) {
				var dataSeries = [];
				var total = 0;
				data.forEach((e) => {
					total += parseInt(e.jml);
				});

				data.forEach((e) => {
					var percentage = parseFloat((e.jml / (total / 100)).toFixed(1));
					if (e.jk == "1") {
						dataSeries.push({
							name: "Pria",
							y: percentage,
							color: "#4CAF50",
						});
					} else {
						dataSeries.push({
							name: "Wanita",
							y: percentage,
							color: "#FF5252",
						});
					}
				});
				Highcharts.chart("chart-gender", {
					chart: {
						type: "pie",
					},
					title: {
						text: "",
					},
					tooltip: {
						headerFormat: "",
						pointFormat: "<b>{point.name}</b><br/>",
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: "pointer",
							depth: 35,
							dataLabels: {
								enabled: true,
								format: "{point.percentage:.1f}%",
								distance: -50,
							},
							showInLegend: true,
						},
					},
					series: [
						{
							type: "pie",
							name: "Browser share",
							data: dataSeries,
						},
					],
					exporting: {
						enabled: false,
					},
				});
			},
		});
	},
	chartGenderBarByBagian: function chartGenderBarByBagian() {
		console.log("status");
		$.ajax({
			type: "ajax",
			url: "hrd/getEmployeeByGenderByDepartment",
			dataType: "JSON",
			success: function (data) {
				console.log("status1");
				var wanita = [];
				var pria = [];
				var department = [];
				data.forEach((e) => {
					console.log(e.gender);
					pria.push(parseInt(e.gender[0]));
					wanita.push(parseInt(e.gender[1]));
					department.push(e.dept_name);
				});

				console.log(wanita, pria);
				var options = {
					chart: {
						height: 350,
						type: "bar",
						parentHeightOffset: 0,
						fontFamily: "Poppins, sans-serif",
						toolbar: {
							show: false,
						},
					},
					colors: ["#1b00ff", "#f56767"],
					grid: {
						borderColor: "#c7d2dd",
						strokeDashArray: 5,
					},
					plotOptions: {
						bar: {
							horizontal: false,
							columnWidth: "25%",
							endingShape: "rounded",
						},
					},
					dataLabels: {
						enabled: false,
					},
					stroke: {
						show: true,
						width: 2,
						colors: ["transparent"],
					},
					series: [
						{
							name: "Wanita",
							data: wanita,
						},
						{
							name: "Pria",
							data: pria,
						},
					],
					xaxis: {
						categories: department,
						labels: {
							style: {
								colors: ["#353535"],
								fontSize: "16px",
							},
						},
						axisBorder: {
							color: "#8fa6bc",
						},
					},
					yaxis: {
						title: {
							text: "",
						},
						labels: {
							style: {
								colors: "#353535",
								fontSize: "16px",
							},
						},
						axisBorder: {
							color: "#f00",
						},
					},
					legend: {
						horizontalAlign: "right",
						position: "top",
						fontSize: "16px",
						offsetY: 0,
						labels: {
							colors: "#353535",
						},
						markers: {
							width: 10,
							height: 10,
							radius: 15,
						},
						itemMargin: {
							vertical: 0,
						},
					},
					fill: {
						opacity: 1,
					},
					tooltip: {
						style: {
							fontSize: "15px",
							fontFamily: "Poppins, sans-serif",
						},
						y: {
							formatter: function (val) {
								return val;
							},
						},
					},
				};

				var chart = new ApexCharts(
					document.querySelector("#chart-gender-department"),
					options
				);
				chart.render();
			},
		});
	},
};

$("document").ready(function () {
	obj.init();
});
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
		if (departemen != null) {
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
	if ($value == "2") {
		$("#departemen-select-new").show();
	} else {
		$("#departemen-select-new").hide();
	}
}

function checkUserTypeEdit() {
	$value = $("#tipe_user_edit").val();
	if ($value == "2") {
		$("#departemen-select-edit").show();
	} else {
		$("#departemen-select-edit").hide();
	}
}

function showCriteria(dataDept, ) {
	console.log(dataDept);
	var ids = dataDept.split(',');
	
	ids.forEach(e => {
		var displayStatus = document.getElementById("div-"+e).style.display;
		if(displayStatus == '' || displayStatus == 'block') {
			document.getElementById("div-"+e).style.display = 'none';
		}
	});

	var deptSelected = $("#departemen-select").val();
	document.getElementById("div-"+deptSelected).style.display = '';
}

function addNewCriteria() {
	var idActive = $("#departemen-select").val();

	var lastLength = $("#kriteria-length-"+idActive).val();
	var nowLength = parseInt(lastLength) + 1;

	$("#kriteria-length-"+idActive).val(nowLength);

	var divContainer = $("#div-kriteria-new-"+idActive);

	var divParent = document.createElement('div');
	divParent.id = "kriteria"+nowLength+"-"+idActive;
	divParent.classList = 'col-md-12 row';

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
	inputTextBobot.id = "criteria_new_rating"+nowLength+"-"+idActive;
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
}

function buttonEditKriteria() {
	var idActive = $("#departemen-select").val();

	var lengthKritria = parseInt($("#kriteria-length-edit-"+idActive).text());
	var jmlBobot = 0;
	for (let i = 0; i < lengthKritria; i++) {
		jmlBobot += parseInt($("#criteria_rating"+i+"-"+idActive).val());
		console.log(jmlBobot);
	}

	if(jmlBobot > 100) {
		alert("Jumlah nilai bobot tidak boleh lebih dari 100");
		return;
	}

	$("#submit-edit-kriteria-"+idActive).click();
}

function buttonNewKriteria() {
	var idActive = $("#departemen-select").val();

	var lengthKritria = parseInt($("#kriteria-length-"+idActive).val());
	var jmlBobot = 0;
	for (let i = 1; i <= lengthKritria; i++) {
		if($("#criteria_new_rating"+i+"-"+idActive).length != 0) {
			jmlBobot += parseInt($("#criteria_new_rating"+i+"-"+idActive).val());
		}
	}

	if(jmlBobot > 100) {
		alert("Jumlah nilai bobot tidak boleh lebih dari 100");
		return;
	}

	$("#submit-new-kriteria-"+idActive).click();
}

function deleteKriteria(idDiv) {
	var idActive = $("#departemen-select").val();

	$("#"+idDiv+"-"+idActive).remove();
}

function editKriteria(id, name) {
	$("#id-kriteria-edit").val(id);
	$("#kriteria-name").val(name);
}