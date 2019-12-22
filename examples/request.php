<?php 
require '../db.php';
?>
<head>
	<meta charset="UTF-8">
	<title>Аукцион</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700i&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/4e8cfbf59f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/accordion.css">
</head>
<body class="admin_panel">
	
<div class="sidebar">
	<div class="logo"><i class="fas fa-exchange-alt"></i>Auction</div>
	<div class="sidebar_nav">
		<ul class="sidebar_menu">
			<li class="item active"><a href="../panel.php"><i class="fas fa-desktop"></i>Панель управления</a></li>
			<li class="item"><a href="lots.php"><i class="fas fa-ellipsis-v"></i>Лоты</a></li>
			<li class="item"><a href="auctions.php"><i class="fas fa-gavel"></i>Аукционы</a></li>
			<li class="item"><a href="request.php"><i class="fas fa-info"></i>Запросы</a></li>
		</ul>
		<hr>
		<strong>Привет, <?php echo $_SESSION['logged_user']->login; ?>!</strong>
		<ul class="sidebar_menu secondary">
			<li class="item"><a href="#"><i class="fas fa-user"></i>Мой профиль</a></li>
			<li class="item"><a href="#"><i class="fas fa-sliders-h"></i>Настройки</a></li>
			<li class="item"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Выйти</a></li>
		</ul>
	</div>

</div>

	<div class="main-content">

			<header>
				<div class="container">
					<div class="navbar">
						<div class="title"><h4>Панель управления</h4></div>
						<div class="user_panel">
							<div class="search">
								<p>
									<i class="fas fa-search"></i>
									<input type="text" class="search_input" placeholder="Поиск...">
								</p>
							</div>
							<div class="user">
								<img src="../img/user.jpg" alt="<?php echo $_SESSION['logged_user']->login; ?>">
								<span><?php echo $_SESSION['logged_user']->login; ?></span>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div id="cards" class="cards">
				<div class="container">


					<div class="cards-row temp-1-1-1-1">

						<div class="card_body card_profit">
							<div class="title">
								<div class="details">
									<span>Заработок</span>
									<p>
										<?php 
												$profit = R::getAll('SELECT SUM(final_price) as sum FROM lots');
												foreach ( $profit as $pr) {
													echo $pr['sum'];
												}
										?>
									</p>
								</div>
								<div class="icon">
									<i class="fas fa-ruble-sign"></i>
								</div>
							</div>
							<div class="status">
								<p class="green"><i class="fas fa-arrow-up"></i> 3,48%</p>
								<span>за последний месяц</span>
							</div>
						</div>

						<div class="card_body card_users">
							<div class="title">
								<div class="details">
									<span>Клиентов</span>
									<p>
										<?php 
											$peoples = R::count('peoples');
											echo $peoples;
										 ?>
									</p>
								</div>
								<div class="icon">
									<i class="fas fa-users"></i>
								</div>
							</div>
							<div class="status">
								<p class="red"><i class="fas fa-arrow-down"></i> 1,5%</p>
								<span>за последний месяц</span>
							</div>
						</div>

						<div class="card_body card_lots">
							<div class="title">
								<div class="details">
									<span>Активные лоты</span>
									<p>
										<?php 
											$lots = R::count('lots');
											echo $lots;
										 ?>
									</p>
								</div>
								<div class="icon">
									<i class="fas fa-ellipsis-v"></i>
								</div>
							</div>
							<div class="status">
								<p class="red"><i class="fas fa-arrow-down"></i> 17,3%</p>
								<span>за последнюю неделю</span>
							</div>
						</div>

						<div class="card_body card_profit1">
							<div class="title">
								<div class="details">
									<span>Аукционов в базе</span>
									<p>
										<?php 
											$auctions = R::count('auction');
											echo $auctions;
										 ?>
									</p>
								</div>
								<div class="icon">
									<i class="fas fa-archway"></i>
								</div>
							</div>
							<div class="status">
								<p class="green"><i class="fas fa-arrow-up"></i> 5,7%</p>
								<span>за последний месяц</span>
							</div>
						</div>

					</div>
					
					<div class="page-header">
						<h3 class="title">Лоты</h3>
					</div>

					<div class="accordion">
						<div class="container">

							<div class="accordion__item">
								<a href="#req1" class="accordion__title accordion__trigger">Вывести список продавцов, выставлявших свой товар хотя бы на одном аукционе в течение последнего года.<i class="fas fa-arrow-down"></i></a>
								<div id="req1" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req2" class="accordion__title accordion__trigger">Вывести список покупателей, которые приобрели товар на аукционах последних
трех месяцев, и сумма приобретенного товара превысила 100000 рублей.<i class="fas fa-arrow-down"></i></a>
								<div id="req2" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req3" class="accordion__title accordion__trigger"> Подсчитайте количество лотов, которые были выставлены на каждом аукционе,
проводимым фирмой. Упорядочите аукционы по возрастанию времени их проведения.<i class="fas fa-arrow-down"></i></a>
								<div id="req3" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req4" class="accordion__title accordion__trigger"> Выведите сведения о лотах, конечная цена которых больше начальной в 20 раз.<i class="fas fa-arrow-down"></i></a>
								<div id="req4" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req5" class="accordion__title accordion__trigger"> Получите таблицу с распределением сумм денег, которые получила какая-либо
фирма-продавец с начала выставления ею лотов на аукционах до настоящего времени <br> с шагом в полгода.<i class="fas fa-arrow-down"></i></a>
								<div id="req5" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req6" class="accordion__title accordion__trigger">Определите место, где наиболее часто проводились аукционы фирмой.<i class="fas fa-arrow-down"></i></a>
								<div id="req6" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req7" class="accordion__title accordion__trigger">Выведите сведения о наиболее прибыльном аукционе, проводимом фирмой.<i class="fas fa-arrow-down"></i></a>
								<div id="req7" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>


							<div class="accordion__item">
								<a href="#req8" class="accordion__title accordion__trigger">Ранжируйте список покупателей по сумме приобретенных ими вещей на аукционах.<i class="fas fa-arrow-down"></i></a>
								<div id="req8" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req9" class="accordion__title accordion__trigger">Определите вещи, которые выставлялись фирмой на нескольких аукционах прежде, чем были проданы.<i class="fas fa-arrow-down"></i></a>
								<div id="req9" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>

							<div class="accordion__item">
								<a href="#req10" class="accordion__title accordion__trigger">Определите минимальную, максимальную и среднюю цену, которая была дана
за вещи выставляемые на аукционе.<i class="fas fa-arrow-down"></i></a>
								<div id="req10" class="accordion__content"><p>asdasfskdgnksdlgnkla'dgnkl'dnfkgl'dnfkgl</p></div>
							</div>
						</div>
					</div>
			</div>
	</div>

<footer>
	<div class="container">
		<div class="footer-wrap">
			<div class="copyright">
				 <span>© 2019 <a href="#">Razgovorov Evgeny</a></span>
			</div>
			<div class="footer-menu">
				<ul class="menu footer">
					<li><a href="install.php">Создать стуктуру</a></li>
					<li><a href="delete.php">Сброс данных</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<script src="../js/plugins/jquery/dist/jquery.min.js"></script>
<script src="../js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="../js/plugins/chart.js/dist/Chart.extension.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="../js/main.js"></script>
</body>