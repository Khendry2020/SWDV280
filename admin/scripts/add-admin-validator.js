"use strict";


$("#submit-form").click( evt => {
	let isValid = true;


	const username = $("#username").val();
	if (username == "") {
		$("label[for='username']").next().text("Name field is required.");
		isValid = false;
	} else if(username.length > 200) {
		$("label[for='username']").next().text('Too many characters in Name field');
		isValid = false;
	} 
	else {
		$("label[for='username']").next().text("");
	}
    $("#username").val(username);

    const roles = $("#roles").val();
	if (roles == "") {
		$("label[for='roles']").next().text("Roles field is required.");
		isValid = false;
	} else if(roles.length > 50) {
		$("label[for='roles']").next().text('Too many characters in Roles field');
		isValid = false;
	} 
	else {
		$("label[for='roles']").next().text("");
	}
    $("#roles").val(roles);

    const password = $("#password").val();
	if (password == "") {
		$("label[for='password']").next().text("Password field is required.");
		isValid = false;
	} else if(password.length > 50) {
		$("label[for='password']").next().text('Too many characters in Password field');
		isValid = false;
	} 
	else {
		$("label[for='password']").next().text("");
	}
    $("#password").val(password);


	if (isValid != true) {
		evt.preventDefault();
	}
});
