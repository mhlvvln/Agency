function inputSurname(){
	var inputSurname = document.getElementById("inputSurname");
	if (inputSurname.value.length >= 3){
		inputSurname.classList.remove('is-invalid');
		inputSurname.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputSurname.classList.remove('is-valid');
		inputSurname.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputEmail(){
	var inputEmail = document.getElementById('inputEmail');
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(inputEmail.value)) {
  		inputEmail.classList.remove("is-invalid");
  		inputEmail.classList.add("is-valid");
  		allUserCheckReg();
	}
	else{
		inputEmail.classList.remove("is-valid");
  		inputEmail.classList.add("is-invalid");
  		allUserCheckReg();
	}
}


function inputName(){
	var inputName = document.getElementById("inputName");
	if (inputName.value.length >= 2){
		inputName.classList.remove('is-invalid');
		inputName.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputName.classList.remove('is-valid');
		inputName.classList.add('is-invalid');
		allUserCheckReg();
	}
}

 function calculateAge(birthday) { // birthday is a date
   var ageDifMs = Date.now() - birthday;
   var ageDate = new Date(ageDifMs); // miliseconds from epoch
   return Math.abs(ageDate.getUTCFullYear() - 1970);
 }

function inputBirthday(){
	var inputBirthday = document.getElementById("inputBirthday");
	if (calculateAge(new Date(inputBirthday.value)) > 16){
		inputBirthday.classList.remove('is-invalid');
		inputBirthday.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputBirthday.classList.remove('is-valid');
		inputBirthday.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputPatronymic(){
	var inputPatronymic = document.getElementById("inputPatronymic");
	if (inputPatronymic.value.length >= 6){
		inputPatronymic.classList.remove('is-invalid');
		inputPatronymic.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputPatronymic.classList.remove('is-valid');
		inputPatronymic.classList.add('is-invalid');
		allUserCheckReg();
	}
}


/*function inputPatronymic(){
	var inputPatronymic = document.getElementById("inputPatronymic");
	if (inputPatronymic.value.length >= 6){
		inputPatronymic.classList.remove('is-invalid');
		inputPatronymic.classList.add('is-valid');
		allUserCheck();
	}
	else{
		inputPatronymic.classList.remove('is-valid');
		inputPatronymic.classList.add('is-invalid');
		allUserCheck();
	}
}*/


function inputUniversity(){
	var inputUniversity = document.getElementById("inputUniversity");
	if (inputUniversity.value.length > 8){
		inputUniversity.classList.remove('is-invalid');
		inputUniversity.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputUniversity.classList.remove('is-valid');
		inputUniversity.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputSpeciality(){
	var inputSpeciality = document.getElementById("inputSpeciality");
	if (inputSpeciality.value.length > 6){
		inputSpeciality.classList.remove('is-invalid');
		inputSpeciality.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputSpeciality.classList.remove('is-valid');
		inputSpeciality.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputStatus(){
	var inputStatus = document.getElementById("inputStatus");
	if (inputStatus.value.length > 6){
		inputStatus.classList.remove('is-invalid');
		inputStatus.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputStatus.classList.remove('is-valid');
		inputStatus.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputCities(){
	var inputCities = document.getElementById("inputCities");
	if (inputCities.value.length >= 3){
		inputCities.classList.remove('is-invalid');
		inputCities.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputCities.classList.remove('is-valid');
		inputCities.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputAddress(){
	var inputAddress = document.getElementById("inputAddress");
	if (inputAddress.value.length >= 16){
		inputAddress.classList.remove('is-invalid');
		inputAddress.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputAddress.classList.remove('is-valid');
		inputAddress.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputPhone(){
	var inputPhone = document.getElementById("inputPhone");
	if (inputPhone.value.length >= 12 && inputPhone.value.length <= 18){
		inputPhone.classList.remove('is-invalid');
		inputPhone.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputPhone.classList.remove('is-valid');
		inputPhone.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputPassword(){
	var inputPassword = document.getElementById('inputPassword');
	if (inputPassword.value.length >= 8){
		inputPassword.classList.remove('is-invalid');
		inputPassword.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputPassword.classList.remove('is-valid');
		inputPassword.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function inputPasswordConfirm(){
	var inputPassword = document.getElementById('inputPassword');
	var inputPasswordConfirm = document.getElementById('inputPasswordConfirm');
	if (inputPassword.value.length >= 8 && inputPassword.value == inputPasswordConfirm.value){
		inputPasswordConfirm.classList.remove('is-invalid');
		inputPasswordConfirm.classList.add('is-valid');
		allUserCheckReg();
	}
	else{
		inputPasswordConfirm.classList.remove('is-valid');
		inputPasswordConfirm.classList.add('is-invalid');
		allUserCheckReg();
	}
}


function changePhoto(){
	allUserCheckReg();
}

function checkEnableButton(btn)
{
	if (!btn.classList.contains("disabled"))
	{
		btn.classList.remove("btn-success");
		btn.classList.add("disabled");
		btn.classList.add("btn-danger");
	}
}

function allUserCheckReg(){
	if( document.getElementById("applicant_photo").files.length == 0 ){
    return;
	}
	var inputPhone = document.getElementById("inputPhone");
	var btn = document.getElementById('userBtnReg');

	if (inputPhone.classList.contains('is-valid')){
		var inputAddress = document.getElementById("inputAddress");
		if (inputAddress.classList.contains('is-valid'))
		{
			var inputCities = document.getElementById("inputCities");
			if (inputCities.classList.contains('is-valid')){
				var inputStatus = document.getElementById("inputStatus");
				if (inputStatus.classList.contains('is-valid')){
					var inputSpeciality = document.getElementById("inputSpeciality");
					if (inputSpeciality.classList.contains('is-valid')){
						var inputUniversity = document.getElementById("inputUniversity");
						if (inputUniversity.classList.contains('is-valid'))
						{
							var inputPatronymic = document.getElementById("inputPatronymic");
							if (inputPatronymic.classList.contains("is-valid"))
							{
								var inputBirthday = document.getElementById("inputBirthday");
								if (inputBirthday.classList.contains("is-valid"))
								{
									var inputName = document.getElementById("inputName");
									if (inputName.classList.contains("is-valid"))
									{
										var inputEmail = document.getElementById('inputEmail');
										if (inputEmail.classList.contains('is-valid'))
										{
											var inputSurname = document.getElementById("inputSurname");
											if (inputSurname.classList.contains('is-valid'))
											{
												var inputPassword = document.getElementById("inputPassword");
												if (inputPassword.classList.contains('is-valid'))
												{
													var inputPasswordConfirm = document.getElementById('inputPasswordConfirm');
													if (inputPasswordConfirm.classList.contains('is-valid'))
													{
														btn.classList.remove("btn-danger");
														btn.classList.remove("disabled");
														btn.classList.add("btn-success");
														return;
													}
													else{
														checkEnableButton(btn);
														return;
													}
												}else{
													checkEnableButton(btn);
													return;
												}
											}
											else{
												checkEnableButton(btn);
												return;
											}
										} else {checkEnableButton(btn);
												return;}
									} else {checkEnableButton(btn);
												return;}
								}else {checkEnableButton(btn);
												return;}
							}else {checkEnableButton(btn);
												return;}
						}else {checkEnableButton(btn);
												return;}
					}else {checkEnableButton(btn);
												return;}
				}else {checkEnableButton(btn);
												return;}
			}else {checkEnableButton(btn);
												return;}
		}else {checkEnableButton(btn);
												return;}
	}else {checkEnableButton(btn);
												return;}
	/*var btn = document.getElementById('userBtnReg');
	btn.classList.remove("btn-success");
	btn.classList.add("disabled");
	btn.classList.add("btn-danger");*/
}


function inputOrgName(){
	var inputOrgName = document.getElementById("inputOrgName");
	if (inputOrgName.value.length >= 4){
		inputOrgName.classList.remove('is-invalid');
		inputOrgName.classList.add('is-valid');
		allOrgCheckReg();
	}
	else{
		inputOrgName.classList.remove('is-valid');
		inputOrgName.classList.add('is-invalid');
		allOrgCheckReg();
	}
}


function inputOrgEmail()
{
	var inputOrgEmail = document.getElementById("inputOrgEmail");
	filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(inputOrgEmail.value)) {
		inputOrgEmail.classList.remove("is-invalid");
  		inputOrgEmail.classList.add("is-valid");
  		allOrgCheckReg();
	}
	else{
		inputOrgEmail.classList.remove("is-valid");
  		inputOrgEmail.classList.add("is-invalid");
  		allOrgCheckReg();
	}
}


function inputOrgProperties(){
	var inputOrgProperties = document.getElementById("inputOrgProperties");
	if (inputOrgProperties.value.length >= 2){
		inputOrgProperties.classList.remove('is-invalid');
		inputOrgProperties.classList.add('is-valid');
		allOrgCheckReg();
	}
	else{
		inputOrgProperties.classList.remove('is-valid');
		inputOrgProperties.classList.add('is-invalid');
		allOrgCheckReg();
	}
}


function inputOrgAddress()
{
	var inputOrgAddress = document.getElementById("inputOrgAddress");
	if (inputOrgAddress.value.length >= 15){
		inputOrgAddress.classList.remove('is-invalid');
		inputOrgAddress.classList.add('is-valid');
		allOrgCheckReg();
	}
	else{
		inputOrgAddress.classList.remove('is-valid');
		inputOrgAddress.classList.add('is-invalid');
		allOrgCheckReg();
	}
}

function inputOrgPassword(){
	var inputOrgPassword = document.getElementById('inputOrgPassword');
	if (inputOrgPassword.value.length >= 8){
		inputOrgPassword.classList.remove('is-invalid');
		inputOrgPassword.classList.add('is-valid');
		allOrgCheckReg();
	}
	else{
		inputOrgPassword.classList.remove('is-valid');
		inputOrgPassword.classList.add('is-invalid');
		allOrgCheckReg();
	}
}


function inputOrgPasswordConfirm(){
	var inputOrgPassword = document.getElementById('inputOrgPassword');
	var inputOrgPasswordConfirm = document.getElementById('inputOrgPasswordConfirm');
	if (inputOrgPassword.value.length >= 8 && inputOrgPassword.value == inputOrgPasswordConfirm.value){
		inputOrgPasswordConfirm.classList.remove('is-invalid');
		inputOrgPasswordConfirm.classList.add('is-valid');
		allOrgCheckReg();
	}
	else{
		inputOrgPasswordConfirm.classList.remove('is-valid');
		inputOrgPasswordConfirm.classList.add('is-invalid');
		allOrgCheckReg();
	}
}


function inputOrgPhone()
{
	var inputOrgPhone = document.getElementById("inputOrgPhone");
	if (inputOrgPhone.value.length >= 12 && inputOrgPhone.value.length <= 18){
		inputOrgPhone.classList.remove('is-invalid');
		inputOrgPhone.classList.add('is-valid');
		allOrgCheckReg();
	}
	else{
		inputOrgPhone.classList.remove('is-valid');
		inputOrgPhone.classList.add('is-invalid');
		allOrgCheckReg();
	}
}


function allOrgCheckReg(){
	var btn = document.getElementById("orgBtnReg");
	var inputOrgPhone = document.getElementById("inputOrgPhone");
	if (inputOrgPhone.classList.contains('is-valid'))
	{
		var inputOrgPasswordConfirm = document.getElementById('inputOrgPasswordConfirm');
		if (inputOrgPasswordConfirm.classList.contains('is-valid'))
		{
			var inputOrgPassword = document.getElementById('inputOrgPassword');
			if (inputOrgPassword.classList.contains('is-valid'))
			{
				var inputOrgAddress = document.getElementById("inputOrgAddress");
				if (inputOrgAddress.classList.contains('is-valid'))
				{
					var inputOrgProperties = document.getElementById("inputOrgProperties");
					if (inputOrgProperties.classList.contains('is-valid'))
					{
						var inputOrgEmail = document.getElementById("inputOrgEmail");
						if (inputOrgEmail.classList.contains('is-valid'))
						{
							var inputOrgName = document.getElementById("inputOrgName");
							if (inputOrgName.classList.contains('is-valid'))
							{
								btn.classList.remove("btn-danger");
								btn.classList.remove("disabled");
								btn.classList.add("btn-success");
								return;
							} else{
								checkEnableButton(btn);
								return;
							}
						} else{
							checkEnableButton(btn);
							return;
						}	
					} else{
						checkEnableButton(btn);
						return;
					}
				} else{
					checkEnableButton(btn);
					return;
				}
			} else{
				checkEnableButton(btn);
				return;
			}
		}else{
			checkEnableButton(btn);
			return;
		}
	}else{
		checkEnableButton(btn);
		return;
	}
}