jQuery(document).ready(function ($) {

	$(document).ready(function () {
	    $('#selectall').click(function () {
	        $('.tbex-selectall').prop('checked', this.checked);
	    });

	    $('.tbex-selectall').change(function () {
	        var check = ($('.tbex-selectall').filter(":checked").length == $('.tbex-selectall').length);
	        $('#selectall').prop("checked", check);
	    });
	});

});