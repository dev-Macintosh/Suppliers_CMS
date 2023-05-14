<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>Расчёт с поставщиками</title>
	<link rel="stylesheet" type="text/css" href="/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="/css/main.css" />


</head>

<body class="styled-scrollbars">
<?php
		include 'app/includes/promo-action.php';
		include 'app/includes/header.php';
		?>
	<div class="content">

		<div id="content-wrap">
			<div class="content">
				<?php include 'app/views/' . $content_view; ?>
				<div class="content__choice-page">
					<div class="content__choice-page__wrapper">
						<div class="content__choice-page__item">
							Поставщики
						</div>
						<div class="content__choice-page__item">
							Накладные
						</div>
						<div class="content__choice-page__item">
							Товары
						</div>
						<div class="content__choice-page__item">
							Заказы
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php include 'app/includes/footer.php'; ?>
	<div class="go-top"> <img src="/images/icons/right-arrow.png" width="50" alt="Стрелка вверх"> </div>
	<script src="/js/jquery.min.js"></script>
	<script type="module" src="/js/main.js" defer></script>
	<script src="/js/mail.js" defer></script>
</body>

</html>