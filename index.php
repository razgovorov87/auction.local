<?php 
require 'db.php';

if( isset($_SESSION['logged_user']) ) {
	header('Location: /panel.php');
} 
 
				$data = $_POST;
					if( isset($data['do_login']) )
					{
						$errors = array();
						$user = R::findOne('users', "login = ?", array($data['login']));
						if( $user )
						{
								if( password_verify($data['password'], $user->password ) )
								{
									$_SESSION['logged_user'] = $user;
									header('Location: /panel.php');
								} else
								{
									$errors[] = 'Неверный пароль!';
								}
						} else
						{
							$errors[] = 'Пользователь с таким логином не найден!';
						}
					}
?>
<head>
	<meta charset="UTF-8">
	<title>Аукцион</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700i&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/4e8cfbf59f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="header bg-gradient">
		<div class="container">
			<div class="row">

				<div class="col-md-3">
					<div class="logo"><i class="fas fa-exchange-alt"></i>Auction</div>
				</div>
					
					<div class="col-md-4 offset-md-5">
					<div class="header-nav">
						<ul class="menu">
							<li class="menu-item"><a href="index.php" class=""><i class="fas fa-key"></i>Авторизация</a></li>
							<li class="menu-item"><a href="signup.php" class=""><i class="fas fa-user-circle"></i>Регистрация</a></li>
						</ul>
					</div>
				</div>
			</div>

				<div class="row">
					<div class="col-md-12">
						<div class="header-text">
							<div class="container">
								<div class="welcome">
									<h3>Добро пожаловать!</h3>
									<p>Используйте нашу систему для максимальной выгоды с аукционов.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

		</div>
	</header>

	<div class="card-wrap">
		<div class="card-header">Авторизация</div>


		<div class="form-wrap">
			<form action="" method="POST">
			
				<p class="details">Введите данные для авторизации</p>
			
				<p>
						<i class="fas fa-user"></i>
						<input type="text" name="login" placeholder="Логин" value="<?php echo @$data['login']; ?>">
				</p>
				<p>
					<i class="fas fa-unlock-alt"></i>
					<input type="password" name="password" placeholder="Пароль">
				</p>
				<?php 
						if( ! empty($errors) )
					 		{
					 			echo '<span class="errors">'.array_shift($errors).'</span>';
					 		} 
					 ?>
				<p>
					<button type="submit" name="do_login">Войти</button>
				</p>
				
			
			</form>
		</div>


	</div>

</body>