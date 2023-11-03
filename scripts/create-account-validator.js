"use strict";

const $vanilla = (selector) => document.querySelector(selector);

const focusAndSelect = (selector) => {
  const elem = $vanilla(selector);
  elem.focus();
  elem.select();
};

const phonePattern = /^\d{3}-\d{3}-\d{4}$/;
/* https://andrewwoods.net/blog/2018/name-validation-regex/*/
const namePattern = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/;
/* email validation */

// validate the email addresses - https://www.w3resource.com/javascript/form/email-validation.php
const emailPattern = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;



$("#create #submit").click( evt => {

	let isValid = true;
	// validate the name entry
	/*
	const name = $("#name").val().trim();
	if (name == "") {
		$("label[for='name']").next().text("Name field is required.");
		isValid = false;
	} else if(name.length > 50) {
		$("label[for='name']").next().text('Too many characters in Name field');
		isValid = false;
	} else if (!namePattern.test(name)) {
		$("label[for='name']").next().text("Name field may not contain numbers or special character.");
		isValid = false;
	}
	else {
		$("label[for='name']").next().text("");
	}
    $("#name").val(name);
*/

	const username = $("#username").val().trim();
	if (username == "") {
		$("label[for='username']").next().text("Username field is required.");
		isValid = false;
	} else if(username.length > 50) {
		$("label[for='username']").next().text('Too many characters in Name field');
		isValid = false;
	} else {
		$("label[for='username']").next().text("");
	}
    $("#name").val(name);

	const phone = $("#phone").val().trim();

	if (phone == "") {
		$("label[for='phone']").next().text("Phone field is required.");
		isValid = false;
	} else if (!phonePattern.test(phone)) {
		$("label[for='phone']").next().text("Please format your phone number like 555-555-5555.");
		isValid = false;
	}
	else {
		$("label[for='phone']").next().text("");
	}
	$("#phone").val(phone);

	// validate the email addresses

	const email = $("#email").val().trim();
	
	const parts = email.split("@");

	if (email == "") {
		$("label[for='email']").next().text("Email field is required.");
		isValid = false;
	}
	else if (parts[0].length > 64) {
		$("label[for='email']").next().text("Too many characters before @.");
		isValid = false;
	}
	else if (parts[1].length > 255) {
		$("label[for='email']").next().text("Too many characters after @");
		isValid = false;
	}
	else if ( !emailPattern.test(email) ) {
		$("label[for='email']").next().text("Must be a valid email address.");
		isValid = false;
	}
	else {
		$("label[for='email']").next().text("");
	}
	$("#email").val(email);
   

	const emailtest = $("#verify-email").val().trim();

	if (emailtest == "") { 
		$("label[for='verify-email']").next().text("Verify Email Address field is required.");
		isValid = false; 
	} else if (email != emailtest) { 
		$("label[for='verify-email']").next().text("Email addresses must match.");
		isValid = false;
	} else {
		$("label[for='verify-email']").next().text("");
	}
	$("#verify-email").val(emailtest);

	const password = $("#account-password").val();
	if (password == "") {
		$("label[for='account-password']").next().text("Password field is required.");
		isValid = false;
	} else {
		$("label[for='account-password']").next().text("");
	}
    $("#password").val(password);

	const street = $("#street").val().trim();
	if (street == "") {
		$("label[for='street']").next().text("Street Address field is required.");
		isValid = false;
	} else {
		$("label[for='street']").next().text("");
	}
    $("#street").val(street);

	const city = $("#city").val().trim();
	if (city == "") {
		$("label[for='city']").next().text("City field is required.");
		isValid = false;
	} else {
		$("label[for='city']").next().text("");
	}
    $("#city").val(city);

	const state = $("#state").val().trim();
	if (state == "") {
		$("label[for='state']").next().text("State field is required.");
		isValid = false;
	} else {
		$("label[for='state']").next().text("");
	}
    $("#state").val(state);

	const zip = $("#zip").val().trim();
	if (zip == "") {
		$("label[for='zip']").next().text("ZIP field is required.");
		isValid = false;
	} else {
		$("label[for='zip']").next().text("");
	}
    $("#zip").val(zip);


/*
	let date = $("#birthday").val();
	const datePattern =  /^\d{2}\/\d{2}\/\d{4}$/;
	if (date == "") {
		$("#birthday").next().text("Birthday is required.");
		$("#birthday").addClass("warning-red");
		isValid = false;
	} else if (!datePattern.test(date)) {
		date = '';
		$("#birthday").next().text("Use date format mm/dd/yyyy.");
		$("#birthday").addClass("warning-red");
		isValid = false;
	}
	else {
		$("#birthday").next().text("* Birthday");
		$("#birthday").removeClass("warning-red");
	}
	
	$("#birthday").val(date);
   */
	if (isValid == false) {
		evt.preventDefault();
	}
});
