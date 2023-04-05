<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
	<link rel="stylesheet" type="text/css" href="css/profile_user.css">
	<!-- <script type="text/javascript" src="js/auth.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Профиль</title>
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
    				<div class="d-flex col-5">
						<span class="navbar-text navbar-item text-white">
	    					<a class="text-white text-decoration-none" href="<?echo returnSelfHref();?>"><?echo returnNameUserOrOrg();?></a>
	  					</span>
	  					<span class="navbar-text navbar-item navbar-item-end text-white">
	    					<a href="vacancies.html" class="text-white text-decoration-none">Предложения</a>
  						</span>
  						<span class="navbar-text navbar-item navbar-item-end text-white">
	    					<a href="<?="http://" . $_SERVER['SERVER_NAME']?>/logout" class="text-white text-decoration-none">Выход</a>
  						</span>
  					</div>
  				</div>
			</nav>
		</div>
		<div class="profile-content">
			<div class="row">
				<div class="col-4">
				    <div class="card border-success mb-3" style="width: 18rem;">
					    <img class="card-img-top" width="286" height="180" id="main-src" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_187196f9269%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_187196f9269%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2299.4261360168457%22%20y%3D%2296.10909080505371%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
						<div class="card-body">
						  	<div class="card-title text-success">
						  		<button type="button" class="btn btn-profile btn-success btn-lg btn-block">Изучить резюме</button>
						  	</div>
						    <button type="button" class="btn btn-danger btn-profile btn-lg btn-block">Пожаловаться</button>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
				    <div class="jumbotron jumbotron-fluid">
					    <div class="container">
					    	<h1 class="display-5" id="main-username"></h1>
					    	<p class="lead">
					    		<nav>
								  	<div class="nav nav-tabs" id="nav-tab" role="tablist">
								    	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h5 class="text-success">Общее</h5></a>
								   	    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h5>Образование</h5></a>
								    	<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h5 class="text-success">Контакты</h5></a>
								    </div>
								</nav>
								<div class="tab-content" id="nav-tabContent">
								    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								    	
								    	<!--ОБЩЕЕ-->
								    	<table class="table table-sm">
										    <!-- <thead>
										    	<tr>
											        <th scope="col">#</th>
											        <th scope="col">First</th>
											        <th scope="col">Last</th>
											        <th scope="col">Handle</th>
										    	</tr>
										    </thead> -->
										  	<tbody>
											    <tr>
												    <th class="text-success fs-5" colspan="2" scope="row">ФИО:</th>
												    <td colspan="2" style="font-size: 20px;" id="full_name" class="text-primary table_info-about">Вавилин Михаил Евгеньевич</td>
											    </tr>
											    <tr>
											        <th scope="row" class="text-primary fs-5" colspan="2">Пол:</th>
											        <td colspan="2" style="font-size: 20px;" id="gender" class="text-success table_info-about">Мужской</td>
											    </tr>
											    <tr>
											        <th scope="row" class="text-success fs-5" colspan="2">Дата рождения:</th>
											        <td colspan="2" style="font-size: 20px;" id="birthday" class="text-primary table_info-about">27 июня 2004</td>
											    </tr>
											    <tr>
											        <th scope="row" class="text-primary fs-5" colspan="">Социальная категория:</th>
											        <td colspan="2" style="font-size: 20px;" id="status" class="text-success table_info-about">Студент</td>
											    </tr>
										    </tbody>
										</table>
								    </div>
								    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

								    	<!-- ОБРАЗОВАНИЕ -->
								    	<table class="table table-sm">
										    <!-- <thead>
										    	<tr>
											        <th scope="col">#</th>
											        <th scope="col">First</th>
											        <th scope="col">Last</th>
											        <th scope="col">Handle</th>
										    	</tr>
										    </thead> -->
										  	<tbody>
											    <tr>
												    <th class="text-success fs-5" colspan="3" scope="row">Университет:</th>
												    <td colspan="1" style="font-size: 20px;" id="university" class="text-primary table_info-about">Донецкий Национальный Технический Университет</td>
											    </tr>
											    <tr>
											        <th scope="row" class="text-primary fs-5" colspan="3">Специальность:</th>
											        <td colspan="1" style="font-size: 20px;" id="speciality" class="text-success table_info-about">Программная инженерия</td>
											    </tr>
										    </tbody>
										</table>
								    </div>
								    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
								    	<!-- КОНТАКТЫ -->
								    	<table class="table table-sm">
										    <!-- <thead>
										    	<tr>
											        <th scope="col">#</th>
											        <th scope="col">First</th>
											        <th scope="col">Last</th>
											        <th scope="col">Handle</th>
										    	</tr>
										    </thead> -->
										  	<tbody>
											    <tr>
												    <th class="text-success fs-5" colspan="2" scope="row">Город:</th>
												    <td colspan="2" style="font-size: 20px;" id="city" class="text-primary table_info-about">Донецк</td>
											    </tr>
											    <tr>
											        <th scope="row" class="text-primary fs-5"  colspan="2">Адрес:</th>
											        <td colspan="1" style="font-size: 20px;" id="address" class="text-success table_info-about">Г. Донецк, ул. Разенкова, дом 12, кв. 1</td>
											    </tr>
											     <tr>
											        <th scope="row" class="text-success fs-5" colspan="2">Почта:</th>
											        <td colspan="1" style="font-size: 20px;" id="email" class="text-primary table_info-about">mhlvvln@gmail.com</td>
											    </tr>
										    </tbody>
										</table>
								    </div>
								</div>
					    	</p>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
		$('#nav-tab a').on('click', function (e) {
			e.preventDefault()
			$(this).tab('show')
		});

		function formatDate(dateStr) {
			// Преобразуем строку в объект Date
			const date = new Date(dateStr.replace(/-/g, '/'));
		  
		 	// Создаем массивы месяцев и окончаний дней
		 	const months = [
		    	'января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
		    	'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'
		  	];
		  	const endings = ['', '', '', '', '', '', '', '', '', '', '', ''];
		  
		  	// Извлекаем значения дня, месяца и года из объекта Date
		  	const day = date.getDate();
		  	const month = months[date.getMonth()];
		  	const year = date.getFullYear();
		  
		  	// Формируем новую строку даты
		  	const formattedDate = `${day} ${month}${endings[date.getMonth()]} ${year}`;
		  
		  	// Возвращаем отформатированную дату
		  	return formattedDate;
		}

		async function query(){
			var url = window.location.origin + "/api/users.get?id=<?=$id?>&access_token=<?=$_SESSION['user']['access_token']?>";
			console.log(url);
			let response = await fetch(url);
			if (response.ok){
				let data = await response.json();
				console.log(data);
				document.getElementById("main-src").src='data:image/jpeg;base64,' + data.response.photo;
				document.getElementById("main-username").innerHTML = data.response.name + " " + data.response.surname;
				document.getElementById('full_name').innerHTML = data.response.surname + " " + data.response.name + " " + data.response.patronymic;
				document.getElementById("gender").innerHTML = data.response.gender;
				document.getElementById("status").innerHTML = data.response.status;
				document.getElementById("birthday").innerHTML = formatDate(data.response.birthday);
				document.getElementById("university").innerHTML = data.response.university;
				document.getElementById("speciality").innerHTML = data.response.speciality;
				document.getElementById("city").innerHTML = data.response.city;
				document.getElementById("address").innerHTML = data.response.address;
				document.getElementById("email").innerHTML = data.response.email;
			}else{
				// ПЕРЕХОДИМ НА СВОЮ СТРАНИЦУ ЕСЛИ ID НЕВЕРНЫЙ
				window.location.replace(window.location.origin + "/applicant?id=<?=$_SESSION['user']['id']?>")
			}
		} 
		$(document).ready(function(){
			query();
		});

	</script>
</body>