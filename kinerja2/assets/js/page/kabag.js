var obj = {
	init: function() {
		this.addListener();
		this.defaulData();
	},
	addListener: function() {
		var _this = this;
	},
	defaulData: function() {
		$('#datetimepicker1').datetimepicker({format: 'L'});
		$('#datetimepicker2').datetimepicker({format: 'L'});
	}
}

$("document").ready(function () {
	obj.init();
});
