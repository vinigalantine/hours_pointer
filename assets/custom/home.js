$(document).ready(function() {
	do_table();
});

function pointTime(){
	$.ajax({
		url: '/time/point_time',
		type: 'POST',
		async: false,
	})
	.done(function() {
		do_table();
	})
	.fail(function() {
		console.log("error");
	})
}

function getAll(){
	let return_data;
	$.ajax({
		url: '/time/hours_table',
		type: 'POST',
		dataType: 'JSON',
		async: false,
	})
	.done(function(data) {
		return_data = data;
	})
	.fail(function() {
		console.log("error");
	})

	return return_data;
}

function do_table(){
	data = getAll();
	let tbody = $('#table_body');
	let table_data = "";

	$.each(data, function(idx, val) {
		table_data += "<tr>";
			table_data += "<td>"+val.hour+"</td>"
			table_data += "<td>"+val.day+"</td>"
			table_data += "<td>"+val.type_name+"</td>"
		table_data += "</tr>";
	});

	tbody.html(table_data);
}