var obj = {
	aspects: null,
	init: function() {
		var _this = this;
		this.addListener();
		// this.checkDate();
		this.defaultDate();
		$.ajax({
			type: "post",
			url: "/kinerja2/hrd/getAspects",
			success: function (data) {
				_this.aspects = JSON.parse(data);
			}
		});
	},
	addListener: function addListener() {
		var _this = this;
		$(".remove").click(function() {
			var id = $(this).parents("tr").attr("id");
			var table = $(this).parents("tr").attr("tbl-name");
			var post = {
				id: id,
				table: table,
			};
			var dataPost = JSON.stringify(post);

			if (confirm('Anda yakin untuk menghapus data ?')) {
				$.ajax({
					type: "post",
					url: "deleteData",
					dataType: "JSON",
					error: function() {
						alert("Something wrong");
					},
					data: dataPost,
					success: function (data) {
						console.log(id);
						$("#"+id).remove();
						alert("Record removed successfully"); 
					}, 
				});
				// console.log("ID" + id);
			}
		});
		$("#user-type-select").change(function() {
			console.log("CHANGE");
			if($("#user-type-select").val() != "2") {
				$("#dept-div").hide();
			} else {
				$("#dept-div").show();
			}
		});
		$("#show-criteria").click(function() {
			var ids = $("#idDepts").text().split(',');
			console.log(ids);

			ids.forEach(e => {
				var displayStatus = document.getElementById("div-"+e).style.display;
				if(displayStatus == '' || displayStatus == 'block') {
					document.getElementById("div-"+e).style.display = 'none';
				}
			});

			var deptSelected = $("#dept-work").val();
			document.getElementById("div-"+deptSelected).style.display = '';
		});
		$("#new-criteria").click(function() {
			console.log(_this.aspects);
			var divCriteria = document.getElementById('div-criteria');

			var length = parseInt($("#criteria-length").val());

			var divRow = document.createElement('div');
			divRow.id = "criteria"+(length+1);
			divRow.classList.add('row');

			var divCol = document.createElement('div');
			divCol.classList.add('col-md-5');

			var divForm = document.createElement('div');
			divForm.classList.add('form-group');

			var label = document.createElement('label');
			label.innerHTML = 'Kriteria ' + (length+1);

			var input = document.createElement('input');
			input.setAttribute('type', 'text');
			input.setAttribute('name', "criteria"+(length+1));
			input.classList.add('form-control');

			divForm.append(label);
			divForm.append(input);
			divCol.append(divForm);
			// divRow.append(divCol);
			
			var divCol1 = document.createElement('div');
			divCol1.classList.add('col-md-3');

			var divForm1 = document.createElement('div');
			divForm1.classList.add('form-group');

			var label1 = document.createElement('label');
			label1.innerHTML = 'Aspek';

			var select = document.createElement('select');
			select.setAttribute('name', 'aspect'+(length+1));
			select.classList.add('custom-select');
			var aspects = _this.aspects;
			for (let i = 0; i < aspects.length; i++) {
				var opt = document.createElement('option');
				opt.value = aspects[i].id;
				opt.innerHTML = aspects[i].name;
				select.append(opt);
			}

			divForm1.append(label1);
			divForm1.append(select);
			divCol1.append(divForm1);

			var divCol2 = document.createElement('div');
			divCol2.classList.add('col-md-2');

			var divForm2 = document.createElement('div');
			divForm2.classList.add('form-group');

			var label2 = document.createElement('label');
			label2.innerHTML = 'Tipe ';

			var select1 = document.createElement('select');
			select1.setAttribute('name', 'type'+(length+1));
			select1.classList.add('custom-select');
			var criteriaType = ['Core', 'Secondary'];
			for (let i = 0; i < criteriaType.length; i++) {
				var opt = document.createElement('option');
				opt.value = i+1;
				opt.innerHTML = criteriaType[i];
				select1.append(opt);
			}

			divForm2.append(label2);
			divForm2.append(select1);
			divCol2.append(divForm2);
			// divRow.append(divCol1);


			var divCol3 = document.createElement('div');
			divCol3.classList.add('col-md-2');

			var divForm3 = document.createElement('div');
			divForm3.classList.add('form-group');

			var label3 = document.createElement('label');
			label3.innerHTML = 'Target';

			var select2 = document.createElement('select');
			select2.setAttribute('name', 'target'+(length+1));
			select2.classList.add('custom-select');
			var targets = ['Sangat Baik', 'Baik', 'Cukup', 'Kurang', 'Sangat Kurang'];
			for (let i = 5; i >= 1; i--) {
				console.log(targets);
				var opt = document.createElement('option');
				opt.value = i;
				opt.innerHTML = targets[5-i];
				select2.append(opt);
			}

			divForm3.append(label3);
			divForm3.append(select2);
			divCol3.append(divForm3);


			divRow.append(divCol);
			divRow.append(divCol1);
			divRow.append(divCol2);
			divRow.append(divCol3);

			divCriteria.append(divRow);

			$("#criteria-length").val(length+1);
		});
		$("#new-aspect").click(function() {
			console.log(_this.aspects);
			var divAspect = document.getElementById('div-aspect');

			var length = parseInt($("#aspect-length").val());

			var divRow = document.createElement('div');
			divRow.id = "aspect"+(length+1);
			divRow.classList.add('row');

			var divCol = document.createElement('div');
			divCol.classList.add('col-md-6');

			var divForm = document.createElement('div');
			divForm.classList.add('form-group');

			var label = document.createElement('label');
			label.innerHTML = 'Aspek ' + (length+1);

			var input = document.createElement('input');
			input.setAttribute('type', 'text');
			input.setAttribute('name', "aspect"+(length+1));
			input.classList.add('form-control');

			divForm.append(label);
			divForm.append(input);
			divCol.append(divForm);
			divRow.append(divCol);

			var divCol1 = document.createElement('div');
			divCol1.classList.add('col-md-2');

			var divForm1 = document.createElement('div');
			divForm1.classList.add('form-group');

			var label1 = document.createElement('label');
			label1.innerHTML = 'Bobot Core';

			var input1 = document.createElement('input');
			input1.setAttribute('type', 'number');
			input1.setAttribute('name', "coreWeight"+(length+1));
			input1.classList.add('form-control');

			divForm1.append(label1);
			divForm1.append(input1);
			divCol1.append(divForm1);
			divRow.append(divCol1);

			var divCol2 = document.createElement('div');
			divCol2.classList.add('col-md-2');

			var divForm2 = document.createElement('div');
			divForm2.classList.add('form-group');

			var label2 = document.createElement('label');
			label2.innerHTML = 'Bobot Secondary';

			var input2 = document.createElement('input');
			input2.setAttribute('type', 'number');
			input2.setAttribute('name', "secondaryWeight"+(length+1));
			input2.classList.add('form-control');

			divForm2.append(label2);
			divForm2.append(input2);
			divCol2.append(divForm2);
			divRow.append(divCol2);

			var divCol3 = document.createElement('div');
			divCol3.classList.add('col-md-2');

			var divForm3 = document.createElement('div');
			divForm3.classList.add('form-group');

			var label3 = document.createElement('label');
			label3.innerHTML = 'Bobot Aspek';

			var input2 = document.createElement('input');
			input2.setAttribute('type', 'number');
			input2.setAttribute('name', "aspectWeight"+(length+1));
			input2.classList.add('form-control');

			divForm3.append(label3);
			divForm3.append(input2);
			divCol3.append(divForm3);
			divRow.append(divCol3);

			divAspect.append(divRow);

			$("#aspect-length").val(length+1);
		}),
		$("#change-criteria-name").click (function() {
			$("#id-kriteria-edit").val($(this).attr('data-id'));
			$("#kriteria-name").val($(this).attr('data-name'));
		});
	},
	defaultDate: function() {
		var _this = this;
		$('#datetimepicker1').datetimepicker({format: 'L'});
		$('#datetimepicker2').datetimepicker({format: 'L'});
	},
	checkDate: function() {
		if($('input[name="birth_date"]').val() != '' || $('input[name="birth_date"]').val() != null) {
			return $('input[name="birth_date"]').val();
		}
	},
	toMMDDYYYY: function(date) {
		var datePart = date.split("/");
		var MMDDYYYY = [datePart[1], datePart[0],datePart[2]].join('/');
		return MMDDYYYY;
	}
}

$("document").ready(function () {
	obj.init();
});

function editKriteria(id, name) {
	$("#id-kriteria-edit").val(id);
	$("#kriteria-name").val(name);
}
