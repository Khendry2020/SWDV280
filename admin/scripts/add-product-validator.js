"use strict";


$("#submit-form").click( evt => {
	let isValid = true;


	const name = $("#name").val();
	if (name == "") {
		$("label[for='name']").next().text("Product Name field is required.");
		isValid = false;
	} else if(name.length > 200) {
		$("label[for='name']").next().text('Too many characters in Name field');
		isValid = false;
	} 
	else {
		$("label[for='name']").next().text("");
	}
    $("#name").val(name);

	const price = $("#price").val();
	if (price == "") {
		$("label[for='price']").next().text("Price field is required.");
		isValid = false;
	} 
	else {
		$("label[for='price']").next().text("");
	}
    $("#price").val(price);

    const description = $("#description").val();
	if (description == "") {
		$("label[for='description']").next().text("Description field is required.");
		isValid = false;
	} 
	else {
		$("label[for='description']").next().text("");
	}
    $("#description").val(description);


	if (isValid != true) {
		evt.preventDefault();
	}
});
