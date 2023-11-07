
var custS = document.querySelector('#customerSearch');
if(custS != null) {
	dselect(custS, {
	  search: true
	});
}

var itemS = document.querySelector('#itemSearch');
if(itemS != null) {
	dselect(itemS, {
	  search: true
	});
}

function searchItem(id) {
	if(id != '') {
		$.ajax({
		    url: `/skus/get/${id}`,
		    method: 'GET',
		    dataType: 'json',
		    success: function(data) {
		        $('#price').val(data.price);
		    },
		    error: function(xhr, status, error) {
		        console.error('An error occurred:', error);
		    }
		});
	}
}

function calculate() {
	const price = document.getElementById('price').value;
	const quantity = document.getElementById('quantity').value;

	document.getElementById('tamount').value = price * quantity;
}

function resetAdd() {
	const add = document.getElementById('add1');
	const edit = document.getElementById('edit1');
	add.classList.remove('d-none');
	edit.classList.add('d-none');

	// Get references to the HTML elements
	const name = document.getElementById("itemSearch");
	const price = document.getElementById("price");
	const quantity = document.getElementById("quantity");
	const tamount = document.getElementById("tamount");

	// Clear input fields after adding to the table
	name.value = "";
	price.value = "";
	quantity.value = "";
	tamount.value = "";
	var itemS = document.querySelector('#itemSearch');
	dselect(itemS, {
	  search: true
	});
}

function add() {
	// Get references to the HTML elements
	const name = document.getElementById("itemSearch");
	const price = document.getElementById("price");
	const quantity = document.getElementById("quantity");
	const tamount = document.getElementById("tamount");
	const table = document.getElementById('items');
	var oamount = document.getElementById('oamount');
	var dueAmt = document.getElementById('dueAmt');

	// Check the item if existing in table
	var items = document.querySelectorAll('.item');
	var flag = true;
	var index = 0;
	var overallAmount = 0;

	items.forEach(item => {
	    var arr = item.value.split('|');
	    if (arr[0] == name.value) {
	        flag = false;

	        arr[1] = String(parseInt(arr[1]) + parseInt(quantity.value));
        	arr[2] = String(parseInt(arr[2]) + parseInt(tamount.value));

	        table.rows[index].cells[0].innerHTML = (name.options[name.selectedIndex].text)+"<input type='text' value='"+arr.join('|')+"' name='items[]' class='item' hidden readonly>";
	        table.rows[index].cells[1].textContent = arr[1];
	        table.rows[index].cells[2].textContent = arr[2];
	    }
	    overallAmount += parseInt(arr[2]);
	    index++;
	});

	if(flag && name.value != '') {
		// Create a new row for the table
		const newRow = table.insertRow(table.rows.length);

		// Insert data into the new row
		const cell1 = newRow.insertCell(0);
		const cell2 = newRow.insertCell(1);
		const cell3 = newRow.insertCell(2);
		const cell4 = newRow.insertCell(3);
		overallAmount += parseInt(tamount.value);

		cell1.innerHTML = (name.options[name.selectedIndex].text)+"<input type='text' value='"+name.value+"|"+quantity.value+"|"+tamount.value+"' name='items[]' class='item' hidden readonly>";
		cell2.innerHTML = quantity.value;
		cell3.innerHTML = tamount.value;
		cell4.innerHTML = "<a href='javascript:;' class='text-secondary font-weight-bold text-xs edit-btn' data-bs-toggle='modal' data-bs-target='#add-modal' data-id='"+(table.rows.length-1)+"' onclick='updateItem(this)'>Edit</a>";
	}

	oamount.innerHTML = overallAmount;
	dueAmt.value = overallAmount;

	// Clear input fields after adding to the table
	name.value = "";
	price.value = "";
	quantity.value = "";
	tamount.value = "";
	var itemS = document.querySelector('#itemSearch');
	dselect(itemS, {
	  search: true
	});
}

function edit() {
	// Get references to the HTML elements
	const name = document.getElementById("itemSearch");
	const price = document.getElementById("price");
	const quantity = document.getElementById("quantity");
	const tamount = document.getElementById("tamount");
	const table = document.getElementById('items');
	var oamount = document.getElementById('oamount');
	var dueAmt = document.getElementById('dueAmt');

	// Check the item if existing in table
	var items = document.querySelectorAll('.item');
	var flag = true;
	var index = 0;
	var overallAmount = 0;

	items.forEach(item => {
	    var arr = item.value.split('|');
	    if (arr[0] == name.value) {
	        flag = false;

	        arr[1] = parseInt(quantity.value);
        	arr[2] = parseInt(tamount.value);

	        table.rows[index].cells[0].innerHTML = (name.options[name.selectedIndex].text)+"<input type='text' value='"+arr.join('|')+"' name='items[]' class='item' hidden readonly>";
	        table.rows[index].cells[1].textContent = arr[1];
	        table.rows[index].cells[2].textContent = arr[2];
	    }
	    index++;
	    overallAmount += parseInt(arr[2]);
	});

	oamount.innerHTML = overallAmount;
	dueAmt.value = overallAmount;

	// Clear input fields after adding to the table
	name.value = "";
	price.value = "";
	quantity.value = "";
	tamount.value = "";
	var itemS = document.querySelector('#itemSearch');
	dselect(itemS, {
	  search: true
	});
}

function updateItem(button) {
	const add = document.getElementById('add1');
	const edit = document.getElementById('edit1');
	add.classList.add('d-none');
	edit.classList.remove('d-none');

    const itemId = button.getAttribute('data-id');
    const table = document.getElementById('items');
    const name = document.getElementById("itemSearch");
	const price = document.getElementById("price");
	const quantity = document.getElementById("quantity");
	const tamount = document.getElementById("tamount");
	var items = document.querySelectorAll('.item');
	var arr = items[itemId].value.split('|');

	quantity.value = table.rows[itemId].cells[1].textContent;
	tamount.value = table.rows[itemId].cells[2].textContent;
	$("#itemSearch option[value='"+arr[0]+"']").prop('selected', true);
	searchItem(arr[0]);

	var itemS = document.querySelector('#itemSearch');
	dselect(itemS, {
	  search: true
	});
}