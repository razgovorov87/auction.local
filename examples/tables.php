<?php 
require '../db.php';
require '../list.php';

$data = $_POST;
if( isset($data['add_lot']) ) {
	$item = R::load('item', $data['item']);
	$seller = R::load('peoples', $data['seller']);
	$buyer = R::load('peoples', $data['buyer']);
	$status = R::load('status', $data['status']);
	$auction = R::load('auction', $data['auction']);

	$lot = R::dispense('lots');
	$lot->number = $data['number'];
	$lot->item = $item;
	$lot->start_date = $data['start_date'];
	$lot->start_price = $data['start_price'];
	$lot->seller = $seller;
	if($data['status'] != 2) {
		$lot->final_price = $data['final_price'];
		$lot->buyer = $buyer;
	}
	$lot->status = $status;
	$lot->auction = $auction;
	R::store($lot);
}

if( isset($data['add_auction']) ) {
	$auction = R::dispense('auction');
	$specification = R::load('specification', $data['specification']);

	$auction->title = $data['title'];
	$auction->start_date = $data['start_date'];
	$auction->specification = $specification;
	R::store($auction);
}

if( isset($data['add_item']) ) {
	$item = R::dispense('item');

	$item->title = $data['title'];
	$item->description = $data['desc'];
	R::store($item);
}

if( isset($data['add_specification']) ) {
	$specification = R::dispense('specification');

	$specification->title = $data['title'];
	R::store($specification);
}

if( isset($data['add_status']) ) {
	$status = R::dispense('status');

	$status->title = $data['title'];
	R::store($status);
}

if( isset($data['add_people']) ) {
	$people = R::dispense('peoples');

	$people->name = $data['name'];
	$people->surname = $data['surname'];
	$people->birthday = $data['bday'];
	R::store($people);
}


?>
<head>
	<meta charset="UTF-8">
	<title>Аукцион</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700i&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/4e8cfbf59f.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body class="admin_panel">
	
<div class="sidebar">
	<div class="logo"><i class="fas fa-exchange-alt"></i>Auction</div>
	<div class="sidebar_nav">
		<ul class="sidebar_menu">
			<li class="item active"><a href="../panel.php"><i class="fas fa-desktop"></i>Панель управления</a></li>
			<li class="item"><a href="tables.php"><i class="fas fa-table"></i>Таблицы</a></li>
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
				<div class="container-fluid">
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
				<div class="container-fluid">


					<div class="cards-row row">

						<div class="col-md-3">
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
						</div>

						<div class="col-md-3">
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
						</div>
						<div class="col-md-3">
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
						</div>

						<div class="col-md-3">
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

					</div>

					<div class="cards-row row">
						<div class="col-md-12">
							<div class="card-table">
									<div class="table-header">
									<h3>Таблица лотов</h3>
									<a data-toggle="modal" data-target="#lotsModal" class="button">Добавить новый</a>
								</div>

								<!-- Modal Lots-->
								<div class="modal fade lots" id="lotsModal" tabindex="-1" role="dialog" aria-labelledby="lotsModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="lotsModalLabel">Добавление лота</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="container-fluid">
								        	<form action="tables.php" method="POST">


								        			<div class="form-row">
								        				<div class="form-group col-md-6">
								        					<input name="number" type="text" class="form-control" placeholder="Номер лота" required>
								        				</div>
								        				<div class="form-group col-md-6">
								        					<select name="item" id="item" class="form-control">
								        						<option value="none" hidden="">Выберите предмет</option>
								        						<?php 
								        							$items = R::findAll('item');
								        							foreach ( $items as $item) {
								        								echo '<option value="'.$item['id'].'">'.$item['title'].'</option>';
								        							}
								        						 ?>
								        					</select>
								        				</div>
								        			</div>

								        			<div class="form-row">
								        				<div class="form-group col-md-6">
								        					<input id="datepicker" name="start_date" class="form-control" placeholder="Дата продаж" required>
								        				</div>
								        				<div class="form-group col-md-6">
								        					<select name="specification" id="specification" class="form-control">
								        						<option value="none" hidden="">Выберите cтатус</option>
								        						<?php 
								        							$specification = R::findAll('specification');
								        							foreach ( $specification as $row) {
								        								echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
								        							}
								        						 ?>
								        					</select>
								        				</div>
								        			</div>

								        			<div class="form-row">
								        				<div class="form-group col-md-4">
								        					<input name="start_price" type="number" class="form-control" placeholder="Стартовая цена" required>
								        				</div>
								        				<div class="form-group col-md-8">
								        					<select name="seller" id="seller" class="form-control" required>
								        						<option value="none" hidden="">Выберите продавца</option>
								        						<?php 
								        							$peoples = R::findAll('peoples');
								        							foreach ( $peoples as $people) {
								        								echo '<option value="'.$people['id'].'">'.$people['name'].' '.$people['surname'].'</option>';
								        							}
								        						 ?>
								        					</select>
								        				</div>
								        			</div>

								        			<div class="form-row">
								        				<div class="form-group col-md-4">
								        					<input name="final_price" type="number" class="form-control" placeholder="Конечная цена">
								        				</div>
								        				<div class="form-group col-md-8">
								        					<select name="buyer" id="buyer" class="form-control">
								        						<option value="none" hidden="">Выберите покупателя</option>
								        						<?php 
								        							foreach ( $peoples as $people) {
								        								echo '<option value="'.$people['id'].'">'.$people['name'].' '.$people['surname'].'</option>';
								        							}
								        						 ?>
								        					</select>
								        				</div>
								        			</div>

								        			<select name="auction" id="auction" class="form-control">
								        						<option value="none" hidden="">Выберите аукцион</option>
								        						<?php 
								        							$auctions = R::findAll('auction');
								        							foreach ( $auctions as $auction) {
								        								echo '<option value="'.$auction['id'].'">'.$auction['title'].'</option>';
								        							}
								        						 ?>
								        					</select>


								        		</div>
								        </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								        <button type="submit" class="btn btn-primary" name="add_lot">Добавить</button>
								      </div>
										</form>
								    </div>
								  </div>
								</div>
								<!-- Modal Lots -->

								<!-- Modal Auctions-->
								<div class="modal fade" id="auctionsModal" tabindex="-1" role="dialog" aria-labelledby="auctionsModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="auctionsModalLabel">Добавление аукциона</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="container-fluid">
								        	<form action="tables.php" method="POST">


								        			<div class="form-row">
								        				<div class="form-group col-md-6">
								        					<input name="title" type="text" class="form-control" placeholder="Название" required>
								        				</div>
								        				<div class="form-group col-md-6">
								        					<input id="datepicker" name="start_date" class="form-control" placeholder="Дата начала" required>
								        				</div>
								        			</div>

								        			<select name="specification" id="specification" class="form-control">
								        						<option value="none" hidden="">Выберите спецификацию</option>
								        						<?php 
								        							$specification = R::findAll('specification');
								        							foreach ( $specification as $row) {
								        								echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
								        							}
								        						 ?>
								        					</select>


								        		</div>
								        </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								        <button type="submit" class="btn btn-primary" name="add_auction">Добавить</button>
								      </div>
										</form>
								    </div>
								  </div>
								</div>
								<!-- Modal Auctions -->

								<!-- Modal Items-->
								<div class="modal fade" id="itemsModal" tabindex="-1" role="dialog" aria-labelledby="itemsModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="itemsModalLabel">Добавление предмета</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="container-fluid">
								        	<form action="tables.php" method="POST">


								        			<div class="form-row">
								        				<div class="form-group col-md-12">
								        					<input name="title" type="text" class="form-control" placeholder="Название" required>
								        				</div>
								        				<div class="form-group col-md-12">
								        					<textarea name="desc" type="textarea" class="form-control" placeholder="Описание"></textarea>
								        				</div>
								        			</div>
								        		</div>
								        </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								        <button type="submit" class="btn btn-primary" name="add_item">Добавить</button>
								      </div>
										</form>
								    </div>
								  </div>
								</div>
								<!-- Modal Items -->

								<!-- Modal Specification-->
								<div class="modal fade" id="specificationModal" tabindex="-1" role="dialog" aria-labelledby="specificationModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="specificationModalLabel">Добавление спецификации аукционов</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="container-fluid">
								        	<form action="tables.php" method="POST">


								        			<div class="form-row">
								        				<div class="form-group col-md-12">
								        					<input name="title" type="text" class="form-control" placeholder="Название" required>
								        				</div>
								        			</div>
								        		</div>
								        </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								        <button type="submit" class="btn btn-primary" name="add_specification">Добавить</button>
								      </div>
										</form>
								    </div>
								  </div>
								</div>
								<!-- Modal Specification -->

								<!-- Modal Status-->
								<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="statusModalLabel">Добавление статуса</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="container-fluid">
								        	<form action="tables.php" method="POST">


								        			<div class="form-row">
								        				<div class="form-group col-md-12">
								        					<input name="title" type="text" class="form-control" placeholder="Название" required>
								        				</div>
								        			</div>
								        		</div>
								        </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								        <button type="submit" class="btn btn-primary" name="add_status">Добавить</button>
								      </div>
										</form>
								    </div>
								  </div>
								</div>
								<!-- Modal Status -->

								<!-- Modal People-->
								<div class="modal fade" id="peopleModal" tabindex="-1" role="dialog" aria-labelledby="peopleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="peopleModalLabel">Добавление пользователя</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        <div class="container-fluid">
								        	<form action="tables.php" method="POST">


								        			<div class="form-row">
								        				<div class="form-group col-md-6">
								        					<input name="name" type="text" class="form-control" placeholder="Имя" required>
								        				</div>
								        				<div class="form-group col-md-6">
								        					<input name="surname" type="text" class="form-control" placeholder="Фамилия" required>
								        				</div>
								        			</div>

								        			<div class="form-row">
								        				<div class="form-group col-md-12">
								        					<input id="datepicker" name="bday" class="form-control" placeholder="Дата рождения" required>
																</div>
								        			</div>
								        		</div>
								        </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
								        <button type="submit" class="btn btn-primary" name="add_people">Добавить</button>
								      </div>
										</form>
								    </div>
								  </div>
								</div>
								<!-- Modal People -->









									<table id="lots" class="table">
									
										<thead>
											<tr class="title">
													<th scope="col">#</th>
													<th scope="col">Номер лота</th>
													<th scope="col">Название</th>
													<th scope="col">Дата старта</th>
													<th scope="col">Начальная стоимость</th>
													<th scope="col">Конечная стоимость</th>
													<th scope="col">Продавец</th>
													<th scope="col">Покупатель</th>
													<th scope="col">Аукцион</th>
													<th scope="col">Статус</th>
											</tr>
										</thead>
										<tbody>
							
												<?php 
													$lots = R::findAll('lots');
													foreach ( $lots as $lot) {
														echo '<tr>
																		<td scope="row">'.$lot['id'].'</td>
																		<td>'.$lot['number'].'</td>
																		<td>'.$lot->item['title'].'</td>
																		<td>'.date("d.m.Y", strtotime($lot['start_date'])).'</td>
																		<td>'.$lot['start_price'].'</td>';
																		if (empty($lot['final_price'])) {
																			echo '<td style="font-size: 10px; color: #f5365c; font-weight: 700;"><i class="fas fa-times">Идут торги</i></td>';
																		} else 
																		{
																			echo '<td>'.$lot['final_price'].'</td>';
																		}
																		echo '<td>'.$lot->fetchAs('peoples')->seller['name'].'</td>';
																		$buyer = $lot->fetchAs('peoples')->buyer['name'];
																		if (empty($buyer)) {
																			echo '<td><i class="fas fa-times"></i></td>';
																		} else 
																		{
																			echo '<td>'.$buyer.'</td>';
																		}
																		echo '<td>'.$lot->auction['title'].'</td>';
																		if ($lot->status['title'] == "Продано") {
																			echo '<td style="font-size: 10px; color: #2dce89; font-weight: 700;"><i class="fas fa-check" style="margin-right: 10px"></i>Продано</td>';
																		} else 
																		{
																			echo '<td style="font-size: 10px; color: #f5365c; font-weight: 700;"><i class="fas fa-times" style="margin-right: 10px"></i>Торг</td>';
																		}
																		echo '</tr>';
													}
												 ?>
							
										</tbody>
									</table>
							
							</div>
						</div>

			</div>

					<div class="cards-row row">
						<div class="col-md-5">
							<div class="card-table">
									<div class="table-header">
									<h3>Аукционы</h3>
									<a data-toggle="modal" data-target="#auctionsModal" class="button">Добавить новый</a>
								</div>
									<table id="auctions" class="table">
									
										<thead>
											<tr class="title">
													<th scope="col">#</th>
													<th scope="col">Название</th>
													<th scope="col">Дата старта</th>
													<th scope="col">Спецификация</th>
											</tr>
										</thead>
										<tbody>
							
												<?php 
													$auctions = R::findAll('auction');
													foreach ( $auctions as $auction) {
														echo '<tr>
																		<td scope="row">'.$auction['id'].'</td>
																		<td>'.$auction['title'].'</td>
																		<td>'.date("d.m.Y", strtotime($auction['start_date'])).'</td>
																		<td>'.$auction->specification['title'].'</td>';
																		echo '</tr>';
													}
												 ?>
							
										</tbody>
									</table>
							
							</div>
						</div>

						<div class="col-md-4">
									<div class="card-table">
											<div class="table-header">
											<h3>Предметы</h3>
											<a data-toggle="modal" data-target="#itemsModal" class="button">Добавить новый</a>
										</div>
											<table id="tableitems" class="table">
											
												<thead>
													<tr class="title">
															<th scope="col">#</th>
															<th scope="col">Название</th>
															<th scope="col">Описание</th>
													</tr>
												</thead>
												<tbody>
									
														<?php 
															$items = R::findAll('item');
															foreach ( $items as $item) {
																echo '<tr>
																				<td scope="row">'.$item['id'].'</td>
																				<td>'.$item['title'].'</td>
																				<td>'.$item['description'].'</td>';
																				echo '</tr>';
															}
														 ?>
									
												</tbody>
											</table>
									
									</div>

						</div>

							<div class="col-md-3">
								<div class="row">
									<div class="card-table col-md-12">
												<div class="table-header">
												<h3>Спецификации</h3>
												<a data-toggle="modal" data-target="#specificationModal" class="button">Добавить новый</a>
											</div>
												<table id="tablespecification" class="table">
												
													<thead>
														<tr class="title">
																<th scope="col">#</th>
																<th scope="col">Название</th>
														</tr>
													</thead>
													<tbody>
										
															<?php 
																$specification = R::findAll('specification');
																foreach ( $specification as $row) {
																	echo '<tr>
																					<td scope="row">'.$row['id'].'</td>
																					<td>'.$row['title'].'</td>';
																					echo '</tr>';
																}
															 ?>
										
													</tbody>
												</table>
										
									</div>

									<div class="card-table col-md-12 mt20">
												<div class="table-header">
												<h3>Статусы</h3>
												<a data-toggle="modal" data-target="#statusModal" class="button">Добавить новый</a>
											</div>
												<table id="tablestatus" class="table">
												
													<thead>
														<tr class="title">
																<th scope="col">#</th>
																<th scope="col">Название</th>
														</tr>
													</thead>
													<tbody>
										
															<?php 
																$status = R::findAll('status');
																foreach ( $status as $row) {
																	echo '<tr>
																					<td scope="row">'.$row['id'].'</td>
																					<td>'.$row['title'].'</td>';
																					echo '</tr>';
																}
															 ?>
										
													</tbody>
												</table>
										
									</div>
								</div>
							</div>
			</div>
			<div class="cards-row row">
				<div class="col-md-6 offset-sm-6">
					<div class="card-table">
							<div class="table-header">
							<h3>Пользователи</h3>
							<a data-toggle="modal" data-target="#peopleModal" class="button">Добавить нового</a>
						</div>
							<table id="tablepeoples" class="table">
							
								<thead>
									<tr class="title">
											<th scope="col">#</th>
											<th scope="col">Имя</th>
											<th scope="col">Фамилия</th>
											<th scope="col">Дата рождения</th>
									</tr>
								</thead>
								<tbody>
					
										<?php 
											$peoples = R::findAll('peoples');
											foreach ( $peoples as $people) {
												echo '<tr>
																<td scope="row">'.$people['id'].'</td>
																<td>'.$people['name'].'</td>
																<td>'.$people['surname'].'</td>
																<td>'.$people['birthday'].'</td>';
																echo '</tr>';
											}
										 ?>
					
								</tbody>
							</table>
					
					</div>
				</div>
			</div>

	</div>

<footer>
	<div class="container-fluid">
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="../js/plugins/chart.js/dist/Chart.extension.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="../js/plugins/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="../js/plugins/jquery.tabledit.js"></script>
<script src="../js/main.js"></script>
<script src="../js/table.js"></script>
<script>
	$('.modal #datepicker').datepicker({
    todayHighlight: true,
    format: "dd.mm.yyyy"
});
</script>
</body>