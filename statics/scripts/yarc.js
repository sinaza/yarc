$(document).ready(function() {
	refresh_yarc_table();
});

function refresh_yarc_table()
{
	var selectedMonth = $("#monthsDropdown").val();
	var selectedYear = $("#yearsDropdown").val();
	var params = [selectedMonth, selectedYear];

	$.ajax({ url: 'index.php/yarc/get_month_info',
		 data: {params: params},
		 type: 'post',
		 success: function(output) {
			 var result = jQuery.parseJSON(output);
			 fill_yarc_table(result.start_day, result.length);
			 reset_yarc_table_bg();
		 }
	});
}

function fill_yarc_table(start, monthLength)
{
	var count = null;
	var table = document.getElementById('yarc-table');

	for(var i = 1, row; row = table.rows[i]; i++)
	{
		for(var j = 0, col; col = row.cells[j]; j++)
		{
			if(i == 1 && start == j)
				count = 1;

			col.innerHTML = count;

			if(count >= 1 && count < monthLength)
				count++;
			else
				count = null;
		}
	}
}

function reset_yarc_table_bg()
{
	$('table td').removeClass('emptyBg');
	$('table td:empty').addClass('emptyBg');
}
