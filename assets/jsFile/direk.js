var obj = {
	init: function init() {
		this.addListener();
	},
	addListener: function addListener() {
		var _this = this;
		$("#get-riwayat").click(function () {
			var department = $("#department-id").val();
			var employee = $("#employee-id").val();
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
			th.innerHTML = "Nama Karyawan";
			tr.append(th);
			console.log(e);
			if (e.length != 0) {
				e[0].cr.forEach((f, idx) => {
					var th1 = document.createElement("th");
					th1.setAttribute('data-toggle', 'tooltip');
					th1.setAttribute('data-placement', 'top');
					th1.style.verticalAlign = 'middle';
					th1.title = e[0]['cr'][idx][3];
					th1.innerHTML = e[0]['cr'][idx][3] + ' (K' + (idx+1) + ')';
					// th1.innerHTML = "K" + (idx + 1);
					tr.append(th1);
				});
				var th2 = document.createElement("th");
				th2.style.verticalAlign = 'middle';
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
			th.innerHTML = 'Nama Karyawan';
			tr.append(th);
			console.log(e);
			if(e.length != 0) {
				e[0].cr.forEach((f, idx) => {
					var th1 = document.createElement('th');
					th1.setAttribute('data-toggle', 'tooltip');
					th1.setAttribute('data-placement', 'top');
					th1.style.verticalAlign = 'middle';
					th1.title = e[0]['cr'][idx][3];
					th1.innerHTML = e[0]['cr'][idx][3] + ' (K' + (idx+1) + ')';
					// th1.innerHTML = 'K'+(idx+1);
					tr.append(th1);
				})
				var th2 = document.createElement('th');
				th2.style.verticalAlign = 'middle';
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
}

$("document").ready(function () {
	obj.init();
});
