"use strict";


$("#submit-form").click( evt => {
	let isValid = true;


	const category = $("#categorytype").val();
	if (category == "") {
		$("label[for='categorytype']").next().text("Category Name field is required.");
		isValid = false;
	} else if(category.length > 200) {
		$("label[for='categorytype']").next().text('Too many characters in Category Name field');
		isValid = false;
	} 
	else {
		$("label[for='categorytype']").next().text("");
	}
    $("#categorytype").val(category);


	if (isValid != true) {
		evt.preventDefault();
	}
});
