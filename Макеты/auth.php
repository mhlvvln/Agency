<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/auth.css">
	<script type="text/javascript" src="js/auth.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Вход</title>
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
	    					<a class="text-white text-decoration-none" href="/registration">Регистрация</a>
	  					</span>
	  					<span class="navbar-text navbar-item navbar-item-end text-white">
	    					Поддержка
  						</span>
  					</div>
  				</div>
			</nav>
		</div>
		<div class="d-flex align-items-center min-vh-100 auth-content">
			<div class="d-flex justify-content-center align-items-center container">
    			<div class="row col-8">
	        		<div class="form">
	        			<h4>Вход для пользователя</h4><hr>
	            		<div class="form-group">
	                		<input type="email" class="form-control is-invalid user_email" id="inputUserEmail" oninput="inputUserEmail();" aria-labelledby="emailnotification" placeholder="user@mail.ru">
	            		</div>
	            		<br>
	            		<div class="form-group">
	                		<input type="password" class="form-control is-invalid" placeholder="Password123" id="inputUserPassword" oninput="inputUserPassword();" aria-labelledby="passwordnotification">
	            		</div>
	            		<br>
	            		<div class="form-group">
	            			<button type="button" class="btn btn-danger disabled btn-auth" onclick="userAuth();" id=userButton>Я пользователь - войти</button>
	            		</div>
	        		</div>
    			</div>
			</div>			
			<div class="d-flex justify-content-center align-items-center container">
    			<div class="row col-8">
	        		<div class="form">
	        			<h4>Вход для организации</h4><hr>
	            		<div class="form-group">
	                		<input type="email" class="form-control is-invalid user_email" id="inputOrgEmail" oninput="inputOrgEmail();" aria-labelledby="emailnotification" placeholder="organization@mail.ru">
	            		</div>
	            		<br>
	            		<div class="form-group">
	                		<input type="password" class="form-control is-invalid" placeholder="Password123" id="inputOrgPassword" oninput="inputOrgPassword();" aria-labelledby="passwordnotification" oninput="">
	            		</div>
	            		<br>
	            		<div class="form-group">
	            			<button type="button" class="btn btn-danger disabled btn-auth" id="orgButton">Я организация - войти</button>
	            		</div>
	        		</div>
    			</div>
			</div>			
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script type="text/javascript">
		async function userAuth(){
			let data =  {
				email: document.getElementById('inputUserEmail').value,
				password: document.getElementById('inputUserPassword').value
			}
			var url = window.location.origin + "/api/login.php";
			let response = await fetch(url,{
				method: "POST",
				headers: {
					'Content-Type': 'application/json;charset=utf-8'
				},
				body: JSON.stringify(data)
			}).then(response=>{
				console.log(response);
				if (response.ok == true)
					window.location.replace("/applicant");
				else alert("Неверный логин пароль");
			});
		}
	</script>
</body>
</html>