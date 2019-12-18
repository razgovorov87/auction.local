<?php 
require 'db.php';
?>
<head>
	<meta charset="UTF-8">
	<title>Аукцион</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700i&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/4e8cfbf59f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="header bg-gradient">
		<div class="container">
			<div class="header-wrap">

				<div class="logo"><i class="fas fa-exchange-alt"></i>Auction</div>

				<div class="header-nav">
					<ul class="menu">
						<li class="menu-item"><a href="index.php" class=""><i class="fas fa-key"></i>Авторизация</a></li>
						<li class="menu-item"><a href="signup.php" class=""><i class="fas fa-user-circle"></i>Регистрация</a></li>
					</ul>
				</div>
			</div>

				<div class="header-text">
					<div class="container">
						<div class="welcome">
							<h3>Добро пожаловать!</h3>
							<p>Используйте нашу систему для максимальной выгоды с аукционов.</p>
						</div>
					</div>
				</div>

		</div>
	</header>

	<div class="card-wrap">
		<div class="card-header">Регистрация</div>


		<div class="form-wrap">
			<form action="" method="POST">
			
				<p class="details">Введите данные для регистрации</p>
			
				<p>
						<i class="fas fa-user"></i>
						<input type="text" name="login" placeholder="Логин" value="<?php echo @$data['login']; ?>">
				</p>
				<p>
					<i class="fas fa-envelope"></i>
					<input type="email" name="email" placeholder="Email" value="<?php echo @$data['email']; ?>">
				</p>
				<p>
					<i class="fas fa-unlock-alt"></i>
					<input type="password" name="password" placeholder="Пароль">
				</p>
				<p>
					<i class="fas fa-unlock-alt"></i>
					<input type="password" name="password_2" placeholder="Пароль еще раз">
				</p>
				<?php 
						$data = $_POST;
						 if( isset($data['do_signup']) ) 
						 {
						 		$errors = array();
						 		if( trim($data['login']) == '' )
						 		{
						 			$errors[] = 'Введите логин!';
						 		}

						 		if( R::count('users', "login = ?", array($data['login'])) > 0 )
						 		{
						 			$errors[] = 'Пользователь с таким логином уже существует!';
						 		}

						 		if( trim($data['email']) == '' )
						 		{
						 			$errors[] = 'Введите Email!';
						 		}

						 		if( $data['password'] == '' )
						 		{
						 			$errors[] = 'Введите пароль!';
						 		}

						 		if( $data['password_2'] != $data['password'] )
						 		{
						 			$errors[] = 'Повторный пароль введен не верно!';
						 		}


								if( empty($errors) )
 								{
					 				$user = R::dispense('users');
					 				$user->login = $data['login'];
					 				$user->email = $data['email'];
					 				$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
					 				R::store($user);
					 				echo '<span class="errors" style="color: green;">Вы успешно зарегистрированы!</span>';
	 							} else
	 							{
	 								echo '<span class="errors">'.array_shift($errors).'</span>';
 		   			 		}
 		   			 	} 
 		   			 ?>
				<p>
					<button type="submit" name="do_signup">Зарегистрироваться</button>
				</p>
			
			</form>
		</div>


	</div>

</body>
