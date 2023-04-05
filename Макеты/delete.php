<?php

session_start();

/*if($_SESSION['user']){
	header("Location: http://" . $_SERVER['SERVER_NAME'] .  "/profile");
    exit();
}*/

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
	<link rel="stylesheet" type="text/css" href="css/reg.css">
	<script type="text/javascript" src="js/reg.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

	<title>Регистрация</title>
</head>

<body>
	<div class="main">
		<div class="header">
			<nav class="navbar navbar-light fixed-top">
  				<div class="container-fluid text-white">
    				<a class="navbar-brand circle">Л</a>
    				<div class="d-flex">
      					<input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
      					<button class="btn btn-outline-light" type="submit">Поиск</button>
    				</div>
    				<div class="d-flex col-3">
						<span class="navbar-text navbar-item text-white">
	    					<a href="/auth" class="text-white text-decoration-none">Вход</a>
	  					</span>
	  					<span class="navbar-text navbar-item navbar-item-end text-white">
	    					Поддержка
  						</span>
  					</div>
  				</div>
			</nav>
		</div>
		<div class="forms-content">
			<nav>
  				<div class="nav nav-tabs" id="nav-tab" role="tablist">
    				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h4>Соискатель</h4></a>
    				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h4>Организация</h4></a>
  				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
  				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  					<div class="d-flex form-row">
  						<!--ФАМИЛИЯ-->
    					<div class="form-group col-md-5">
      						<input type="text" value="Вавилин" oninput="inputSurname();" class="form-control is-valid" id="inputSurname" placeholder="Фамилия">
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
  						<!--ПОЧТА-->
      						<input type="email" value = "mhlvvln@gmail.com" class="form-control is-valid" oninput="inputEmail();" id="inputEmail" placeholder="email@example.com">
    					</div>
  					</div>
  					<div class="d-flex form-row">
    					<div class="form-group col-md-5">
  						<!--ИМЯ-->
      						<input type="text" class="form-control is-valid" oninput="inputName();" id="inputName" value="Вавилин" placeholder="Имя">
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
  						<!--ДАТА РОЖДЕНИЯ-->
      						<input type="date"  placeholder="sdfdf" class="form-control is-valid" id="inputBirthday" onchange="inputBirthday();">
    					</div>
  					</div>
  					<div class="d-flex form-row">
    					<div class="form-group col-md-5">
  						<!--ОТЧЕСТВО-->
      						<input type="text" value="Вавилин" class="form-control is-valid" oninput="inputPatronymic();" id="inputPatronymic" placeholder="Отчество">
    					</div>
    					<div class="form-group col-md-3"></div>

    					<div class="form-group">
  						<!--ПОЛ-->
      						<input type="checkbox" class="gender" id="toggle" checked data-toggle="toggle" data-on="Я мужчина" data-off="Я женщина" data-onstyle="success" data-offstyle="danger" data-width="410%">
    					</div>
  					</div>
  					<div class="d-flex form-row">
    					<div class="form-group col-md-5">
    						<!--УНИВЕРСИТЕТЫ-->
      						<input type="text" value="Донецкий национальный технический университет" list="universities" class="form-control is-valid" id="inputUniversity" oninput="inputUniversity();" placeholder="Университет">
      						<datalist id="universities">
								<!--СПИСОК УНИВЕРСИТЕТОВ-->
							</datalist>
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
      						<input type="text" list="specialities" value="Программная инженерия" class="form-control is-valid" id="inputSpeciality" placeholder="Специальность" oninput="inputSpeciality();">
      						<datalist id="specialities">
								<!--СПИСОК Специальностей-->
							</datalist>
    					</div>
  					</div>
  					<div class="d-flex form-row">
    					<div class="form-group col-md-5">
    						<!--СОЦИАЛЬНЫЕ ПОЛОЖЕНИЯ-->
      						<input type="text" list="statuses" value="Студент" class="form-control is-valid" id="inputStatus" oninput="inputStatus();" value="Студент" placeholder="Социальное положение">
      						<datalist id="statuses">
								<!--СПИСОК социальных положений-->
							</datalist>
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
      						<input type="text" list="cities" value="Донецк" class="form-control is-valid" id="inputCities" oninput="inputCities();" placeholder="Город">
      						<datalist id="cities">
								<!--СПИСОК городов-->
							</datalist>
    					</div>
  					</div>
  					<div class="d-flex form-row">
  						<!--АДРЕС-->
    					<div class="form-group col-md-5">
      						<input type="text" value="Вавилин" class="form-control is-valid" oninput="inputAddress();" id="inputAddress" placeholder="Адрес">
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
  						<!--ТЕЛЕФОН-->
      						<input type="phone" value="+79775924880" class="form-control is-valid" oninput="inputPhone();" id="inputPhone" placeholder="+7 (777) 777-77-77">
    					</div>
  					</div>
  					<div class="d-flex form-row">
  						<!--ПАРОЛЬ-->
    					<div class="form-group col-md-5">
      						<input type="password" class="form-control is-valid" oninput="inputPassword();" id="inputPassword" placeholder="Пароль">
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
  						<!--ПОВТОРНЫЙ ПАРОЛЬ-->
      						<input type="password" class="form-control is-valid" oninput="inputPasswordConfirm();" id="inputPasswordConfirm" placeholder="Повторите пароль">
    					</div>
  					</div>
  					<div class="d-flex form-row">
  						<div class="form-group">
					    	<div class="custom-file">
							    <input type="file" accept=".jpg, .jpeg, .png" class="custom-file-input" name="applicant_photo" id="applicant_photo" onchange="changePhoto();" lang="ru">
							    <label class="custom-file-label" for="customFileLang">Фотография</label>
							</div>
					  	</div>
  					</div>
  					<div class="row">
    					<div class="col text-center">
      						<button class="btn btn-danger disabled btn-user-reg" id="userBtnReg"><h5>Я соискатель - зарегистрироваться</h5></button>
    					</div>
  					</div>
  				</div>
  				<!--ОРГАНИЗАЦИЯ РЕГИСТРАЦИЯ-->
  				<div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  					<div class="d-flex form-row">
  						<!--НАЗВАНИЕ ОРГАНИЗАЦИИ-->
    					<div class="form-group col-md-5">
      						<input type="text" minlength="3" class="is-invalid form-control " oninput="inputOrgName();" id="inputOrgName" placeholder="Название организации">
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
  						<!--ПОЧТА-->
      						<input type="email" class="form-control is-invalid" id="inputOrgEmail" placeholder="email@example.com" oninput="inputOrgEmail();">
    					</div>
  					</div>
  					<div class="d-flex form-row">
  						<!--ТИП СОБСТВЕННОСТИ-->
    					<div class="form-group col-md-5">
      						<input type="text" list="datalist_company_types" class="form-control is-invalid" id="inputOrgProperties" oninput="inputOrgProperties();" placeholder="Тип собственности">
      						<datalist id="datalist_company_types">
								<!--СПИСОК типов собственностей-->
							</datalist>
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
  						<!--АДРЕС-->
      						<input type="text" class="form-control is-invalid" id="inputOrgAddress" placeholder="Адрес" oninput="inputOrgAddress();">
    					</div>
  					</div>
  					<div class="d-flex form-row">
  						<!--ПАРОЛЬ ОРГАНИЗАЦИИ-->
    					<div class="form-group col-md-5">
      						<input type="password" class="form-control is-invalid" id="inputOrgPassword" placeholder="Пароль" oninput="inputOrgPassword();">
    					</div>
    					<div class="form-group col-md-2"></div>
    					<div class="form-group col-md-5">
  						<!--ПОВТОР ПАРОЛЯ ОРГАНИЗАЦИИ-->
      						<input type="password" class="form-control is-invalid" id="inputOrgPasswordConfirm" placeholder="Повторите пароль" oninput="inputOrgPasswordConfirm();">
    					</div>
  					</div>
  					<div class="d-flex form-row">
  						<!--ТЕЛЕФОН-->
    					<div class="form-group col-md-5">
      						<input type="text" class="form-control is-invalid" id="inputOrgPhone" placeholder="+7 (777) 777-77-77" oninput="inputOrgPhone();">
    					</div>
  					</div>
  					<div class="row">
    					<div class="col text-center">
      						<button class="btn btn-danger disabled btn-user-reg" id="orgBtnReg"><h5>Я организация - зарегистрироваться</h5></button>
    					</div>
  					</div>
  				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			fetch('http://agency/api/helper.getInfoForUserReg', {
				method: 'GET'
			}).then(response=>response.json())
			.then(data=>{
				
				window.universities = [];
				window.specialities = [];
				window.cities = [];
				window.statuses = [];
				window.company_types = []
				
				let response = data.response;
				
				const datalist_statuses = document.getElementById('statuses');
				const datalist_specialities = document.getElementById('specialities');
				const datalist_universities = document.getElementById('universities');
				const datalist_city = document.getElementById('cities');
				const dataliist_company_types = document.getElementById('company_types');


				for (let i = 0; i < data.count; i++){
					if (response[i].source == 'university'){
						window.universities.push(response[i]);
						const option = document.createElement('option');
						option.value = response[i].name;
						option.setAttribute('data-id' , response[i].id);
						datalist_universities.appendChild(option);
					}
					else if (response[i].source == 'speciality'){
						window.specialities.push(response[i]);
						const option = document.createElement('option');
						option.value = response[i].name;
						option.setAttribute('data-id' , response[i].id);
						datalist_specialities.appendChild(option);
					}
					else if (response[i].source == 'city'){
						const option = document.createElement('option');
						option.value = response[i].name;
						option.setAttribute('data-id' , response[i].id);
						datalist_city.appendChild(option);
						window.cities.push(response[i]);
					}
					else if (response[i].source == 'status'){
						const option = document.createElement('option');
						option.value = response[i].name;
						option.setAttribute('data-id' , response[i].id);
						datalist_statuses.appendChild(option);
						window.statuses.push(response[i]);
					} else if(response[i].source == 'company_type'){
						const option = document.createElement('option');
						option.value = response[i].name;
						option.setAttribute('data-id' , response[i].id);
						datalist_company_types.appendChild(option);
						window.company_types.push(response[i]);
					}
					else console.log(response[i].source);

				}
			}).catch(error=>{
				console.log(error);
			})
		});

		$('#nav-tab a').on('click', function (e) {
			e.preventDefault()
			$(this).tab('show')
		});

		$("#userBtnReg").on('click', function(e){
			// определелили пол
			var gender = true;
			const genderToggle = document.getElementById('toggle');
			if (genderToggle.checked)
				gender = true;
			 else 
				gender = false;
			
			var name = document.getElementById('inputName').value;
			var surname = document.getElementById('inputSurname').value;
			var patronymic = document.getElementById('inputPatronymic').value;
			var email = document.getElementById("inputEmail").value;
			console.log(email);
			var birthday = document.getElementById("inputBirthday").value;

			var university = document.getElementById("inputUniversity").value;
			console.log(university);
			university = university.toLowerCase();
			var flag = false;
			for (let i = 0; i < window.universities.length; i++){
				//console.log(window.universities[i].name.toLowerCase());
				if (window.universities[i].name.toLowerCase() == university)
				{
					university = window.universities[i].id;
					console.log("ok!");
					flag = true;
					break;
				}
			}
			if (!flag){
				alert("Выберите университет из списка!");
				return;
			}

			var speciality = document.getElementById("inputSpeciality").value;
			console.log(speciality);
			speciality = speciality.toLowerCase();
			var flag = false;
			for (let i = 0; i < window.specialities.length; i++){
				//console.log(window.universities[i].name.toLowerCase());
				if (window.specialities[i].name.toLowerCase() == speciality)
				{
					speciality = window.specialities[i].id;
					console.log("ok!");
					flag = true;
					break;
				}
			}
			if (!flag){
				alert("Выберите speciality из списка!");
				return;
			}

			var city = document.getElementById("inputCities").value;
			console.log(city);
			city = city.toLowerCase();
			var flag = false;
			for (let i = 0; i < window.cities.length; i++){
				//console.log(window.universities[i].name.toLowerCase());
				if (window.cities[i].name.toLowerCase() == city)
				{
					city = window.cities[i].id;
					console.log("ok!");
					flag = true;
					break;
				}
			}
			if (!flag){
				alert("Выберите city из списка!");
				return;
			}


			var status = document.getElementById("inputStatus").value;
			console.log(status);
			status = status.toLowerCase();
			var flag = false;
			for (let i = 0; i < window.statuses.length; i++){
				//console.log(window.universities[i].name.toLowerCase());
				if (window.statuses[i].name.toLowerCase() == status)
				{
					status = window.statuses[i].id;
					console.log("ok!");
					flag = true;
					break;
				}
			}
			if (!flag){
				alert("Выберите status из списка!");
				return;
			}

			var address = document.getElementById('inputAddress').value;
			var phone = document.getElementById('inputPhone').value;
			var password = document.getElementById('inputPassword').value;
			var password_confirm = document.getElementById('inputPasswordConfirm').value;

			if (password != password_confirm){
				alert("Пароли не совпадают!");
				return;
			}
			const fileInput = document.getElementById('applicant_photo');
			const file = fileInput.files[0];

			// Чтение содержимого файла в виде массива байтов
			const reader = new FileReader();
			reader.onload = function(event) {
			    const byteArray = new Uint8Array(event.target.result);
			    //console.log("Первоначальный: " + byteArray);
			    // Преобразование массива байтов в формат bytea
			    const hexString = Array.from(byteArray, byte => ('0' + byte.toString(16)).slice(-2)).join('');


			    const formData = new FormData();
			    formData.append('name', name);
			    formData.append('surname', surname);
			    formData.append('patronymic', patronymic);
			    formData.append('gender', gender);
			    formData.append('email', email);
			    formData.append('birthday', birthday);
			    formData.append('education_id', university);
			    formData.append('speciality_id', speciality);
			    formData.append('status_id', status);
			    formData.append('city_id', city);
			    formData.append('address', address);
			    formData.append('phone', phone);
			    formData.append('password', password);
			    formData.append('applicant_photo', file);

			    // Отправка POST-запроса с данными в формате JSON и bytea
			    /*const data = {
				    photo: byteArray,
				    name: name,
				    surname: surname,
				    patronymic: patronymic,
				    gender: gender,
				    email: email,
				    birthday: birthday,
				    university: university,
				    speciality: speciality,
				    status: status,
				    city: city,
				    address: address,
				    phone: phone,
				    password: password,
			    };*/
			    //console.log(data);
			    fetch(window.location.origin + '/api/delete.php', {
				    method: 'POST',
				    headers: {
    				  'Accept': 'application/json'
				    },
			    	body: formData
			    })
			    .then(response => response.json())
			    .then(data => {
			    	console.log(data);
					if (data.status == true){
						const redirect = {
							email: email,
							password: password,
						};
						fetch(window.location.origin + '/api/login.php', {
							method: 'POST',
							header:{
								'Content-Type': 'application/json'
							},
							body: JSON.stringify(redirect)
						})
						.then(response => response.json())
						.then(data=>{
							console.log(data);
							window.location.replace(window.location.origin + '/applicant');
						})
						.catch(error => {
							console.log(data);
							//console.log(JSON.stringify(data));
			      			console.error(error);
						});
					}
					else{
						alert(data.message);
					}
			    })
			    .catch(error => {
			    	//console.log(JSON.stringify(data));
			      console.error(error);
			      alert("Ошибка регистрации!");
			      console.log(error);
			    });
			};
			reader.readAsArrayBuffer(file);
		});
	</script>
</body>
</html>