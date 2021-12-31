var obj = {
	init: function init() {
		this.generateChart();
	},
	generateChart: function generateChart() {
		this.chartGenderPie();
		this.chartGenderBarByBagian()
	},
	chartGenderPie: function chartGender() {
		$.ajax({
			type: "ajax",
			url: "/kinerja/hrd/getEmployeeByGender",
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
		$.ajax({
			type: "ajax",
			url: "/kinerja/hrd/getEmployeeByGenderByDepartment",
			dataType: "JSON",
			success: function (data) {
				var wanita = [];
				var pria = [];
				var department = []
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
						type: 'bar',
						parentHeightOffset: 0,
						fontFamily: 'Poppins, sans-serif',
						toolbar: {
							show: false,
						},
					},
					colors: ['#1b00ff', '#f56767'],
					grid: {
						borderColor: '#c7d2dd',
						strokeDashArray: 5,
					},
					plotOptions: {
						bar: {
							horizontal: false,
							columnWidth: '25%',
							endingShape: 'rounded'
						},
					},
					dataLabels: {
						enabled: false
					},
					stroke: {
						show: true,
						width: 2,
						colors: ['transparent']
					},
					series: [{
						name: 'Wanita',
						data: wanita
					}, {
						name: 'Pria',
						data: pria
					}],
					xaxis: {
						categories: department,
						labels: {
							style: {
								colors: ['#353535'],
								fontSize: '16px',
							},
						},
						axisBorder: {
							color: '#8fa6bc',
						}
					},
					yaxis: {
						title: {
							text: ''
						},
						labels: {
							style: {
								colors: '#353535',
								fontSize: '16px',
							},
						},
						axisBorder: {
							color: '#f00',
						}
					},
					legend: {
						horizontalAlign: 'right',
						position: 'top',
						fontSize: '16px',
						offsetY: 0,
						labels: {
							colors: '#353535',
						},
						markers: {
							width: 10,
							height: 10,
							radius: 15,
						},
						itemMargin: {
							vertical: 0
						},
					},
					fill: {
						opacity: 1
				
					},
					tooltip: {
						style: {
							fontSize: '15px',
							fontFamily: 'Poppins, sans-serif',
						},
						y: {
							formatter: function (val) {
								return val
							}
						}
					}
				};

				var chart = new ApexCharts(document.querySelector("#chart-gender-department"), options);
				chart.render();
			}
		})
	}
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
