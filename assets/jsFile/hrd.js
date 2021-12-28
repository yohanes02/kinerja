var obj = {
	init: function init() {
		this.generateChart();
	},
	generateChart: function generateChart() {
		this.chartGender();
	},
	chartGender: function chartGender() {
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
