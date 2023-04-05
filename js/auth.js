var orgEmail = document.getElementById("inputOrgEmail");
var orgPassword = document.getElementById('inputOrgPassword');

function inputUserEmail(){
	var userEmail = document.getElementById('inputUserEmail');
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(userEmail.value)) {
  		userEmail.classList.remove("is-invalid");
  		userEmail.classList.add("is-valid");
  		allUserCheck();
	}
	else
  	{
  		userEmail.classList.remove("is-valid");
  		userEmail.classList.add("is-invalid");
  		allUserCheck();
  	}
}

function inputUserPassword(){
	var userPassword = document.getElementById('inputUserPassword');
	if (userPassword.value.length >= 8)
	{
		userPassword.classList.remove("is-invalid");
  		userPassword.classList.add("is-valid");
  		allUserCheck();
	}
	else{
		userPassword.classList.remove("is-valid");
  		userPassword.classList.add("is-invalid");
  		allUserCheck();
	}
}

function allUserCheck(){
	var userEmail = document.getElementById('inputUserEmail');
	var userPassword = document.getElementById('inputUserPassword');
	var userButton = document.getElementById("userButton");
	if (userEmail.classList.contains('is-valid') && userPassword.classList.contains('is-valid'))
	{
		userButton.classList.remove("btn-danger");
		userButton.classList.remove("disabled");
		userButton.classList.add("btn-success");
	}
	else{
		userButton.classList.add("disabled");
		userButton.classList.remove("btn-success");
		userButton.classList.add("btn-danger");
	}
}


function inputOrgEmail()
{
	var orgEmail = document.getElementById("inputOrgEmail");
	//var orgPassword = document.getElementById('inputOrgPassword');
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(orgEmail.value)) {
  		orgEmail.classList.remove("is-invalid");
  		orgEmail.classList.add("is-valid");
  		allOrgCheck();
	}
	else
  	{
  		orgEmail.classList.remove("is-valid");
  		orgEmail.classList.add("is-invalid");
  		allOrgCheck();
  	}
}

function inputOrgPassword(){
	var orgPassword = document.getElementById('inputOrgPassword');
	if (orgPassword.value.length >= 8)
	{
		orgPassword.classList.remove("is-invalid");
  		orgPassword.classList.add("is-valid");
  		allOrgCheck();
	}
	else{
		orgPassword.classList.remove("is-valid");
  		orgPassword.classList.add("is-invalid");
  		allOrgCheck();
	}
}


function allOrgCheck(){
	var orgEmail = document.getElementById("inputOrgEmail");
	var orgPassword = document.getElementById('inputOrgPassword');
	var orgButton = document.getElementById("orgButton");
	if (orgEmail.classList.contains('is-valid') && orgPassword.classList.contains('is-valid'))
	{
		orgButton.classList.remove("btn-danger");
		orgButton.classList.remove("disabled");
		orgButton.classList.add("btn-success");
	}
	else{
		orgButton.classList.add("disabled");
		orgButton.classList.remove("btn-success");
		orgButton.classList.add("btn-danger");
	}
}