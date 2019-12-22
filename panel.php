<?php 
require 'db.php';
$profits = R::getAll("SELECT m.Month, SUM(lots.final_price)/1000 as price, lots.start_date FROM lots RIGHT JOIN ( SELECT 01 num, 'Jan' AS MONTH UNION SELECT 02 num, 'Feb' AS MONTH UNION SELECT 03 num, 'Mar' AS MONTH UNION SELECT 04 num, 'Apr' AS MONTH UNION SELECT 05 num, 'May' AS MONTH UNION SELECT 06 num, 'Jun' AS MONTH UNION SELECT 07 num, 'Jul' AS MONTH UNION SELECT 08 num, 'Aug' AS MONTH UNION SELECT 09 num, 'Sep' AS MONTH UNION SELECT 10 num, 'Oct' AS MONTH UNION SELECT 11 num, 'Nov' AS MONTH UNION SELECT 12 num, 'Dec' AS MONTH ) AS m ON month(lots.start_date) = m.num GROUP BY m.Month ORDER BY m.num");

?>
<head>
	<meta charset="UTF-8">
	<title>Аукцион</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700i&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/4e8cfbf59f.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="admin_panel">
	
<div class="sidebar">
	<div class="logo"><i class="fas fa-exchange-alt"></i>Auction</div>
	<div class="sidebar_nav">
		<ul class="sidebar_menu">
			<li class="item active"><a href="panel.php"><i class="fas fa-desktop"></i>Панель управления</a></li>
			<li class="item"><a href="examples/lots.php"><i class="fas fa-ellipsis-v"></i>Лоты</a></li>
			<li class="item"><a href="examples/auctions.php"><i class="fas fa-gavel"></i>Аукционы</a></li>
			<li class="item"><a href="examples/request.php"><i class="fas fa-info"></i>Запросы</a></li>
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
								<img src="img/user.jpg" alt="<?php echo $_SESSION['logged_user']->login; ?>">
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
									<p id="profit">
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

				<div class="cards-row temp-8-4">
						<div class="card-table lots">

							<div class="table-header">
								<h3>Таблица лотов</h3>
								<a href="#" class="button">Добавить новый</a>
							</div>

							<div class="table-responsive">
								<table class="table">
								
									<thead class="thead-light">
										<tr class="title">
											<th scope="col">Название лота</th>
											<th scope="col">Дата проведения</th>
											<th scope="col">Аукцион</th>
											<th scope="col">Начальная стоимость</th>
										</tr>
									</thead>
									<tbody>

										<?php 
											$lots = R::findAll('lots', "ORDER BY id ASC LIMIT 8");
											foreach ( $lots as $lot) {
													echo '<tr>
															<th scope="col" class="th_title">'.$lot->item['title'].'</th>
															<th scope="col">'.date("d.m.Y", strtotime($lot['start_date'])).'</th>
															<th scope="col">'.$lot->auction['title'].'</th>
															<th scope="col">'.$lot['start_price'].'₽</th>
														</tr>';
											}
										 ?>

									</tbody>
								</table>
							</div>
						</div>

						<div class="card-table chart-table">

							<div class="table-header chart-header">
								<span>Характеристика</span>
								<h3>Продажи</h3>
							</div>

							<div class="chart">
								
								<script>

									   var $chart_data = <? echo '[';
																						foreach( $profits as $profit) {
																							if ($profit['price'] == 0) {
																								echo '0';
																							} else echo $profit['price'];
																							echo ',';
																						}
																					echo ']'; ?>;
								</script>
                <canvas id="chart-orders" class="chart-canvas"></canvas>
              </div>
						</div>
				</div>

				<div class="cards-row temp-8-4">

					<div class="card-table dn"></div>

					<div class="card-table small">

						<div class="table-header">
								<h3>Клиенты</h3>
								<a href="#" class="button">Добавить нового</a>
							</div>

						<div class="table-responsive">
								<table class="table">
								
									<thead class="thead-light">
										<tr class="title">
											<th scope="col">ФИО</th>
											<th scope="col">Дата рождения</th>
										</tr>

									</thead>
									<tbody>


										<?php
											$users = R::findAll('peoples', "ORDER BY 'id' ASC");
											foreach( $users as $user) {
												echo '<tr>
																<th scope="col" class="th_title">'.$user['name'].' '.$user['surname'] .'</th>
																<th scope="col">'.date("d.m.Y", strtotime($user['birthday'])).'</th>
															</tr>';
											}
										?>

									</tbody>
								</table>
					


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
					<li><a href="examples/install.php">Создать стуктуру</a></li>
					<li><a href="examples/delete.php">Сброс данных</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<script src="js/plugins/jquery/dist/jquery.min.js"></script>
<script src="js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="js/plugins/chart.js/dist/Chart.extension.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="js/main.js"></script>
</body>