<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Save Walter White</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600"
	rel="stylesheet">

<link rel="stylesheet"
	href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet"
	href="https://code.getmdl.io/1.3.0/material.grey-amber.min.css" />
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<link href="/css/app.css" rel="stylesheet">


<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

<script
	src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.bundle.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.css">

<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

<script src="/js/app.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
	<div class="flex-center">

		<div class="content">
			<h1>Save Walter White</h1>
			<h3>Donations Statistics</h3>
			<div>
				<a href="/" style="font-weight: bold">Back to main page</a> | <a
					href="/donate" style="font-weight: bold">Donate</a>
			</div>
			<div class="row"
				style="background-color: white; border: 1px solid #cccccc; width: 100%">

				<div class="column" style="text-align: center;">
					<div class="demo-card-square mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title mdl-card--expand"></div>
						<div class="mdl-card__supporting-text totDonations">
							<h2 class="mdl-card__title-text">Total amount collected</h2>
							<br />$ {{$totAmount}}<br />
						</div>
					</div>

				</div>

				<div class="column" style="text-align: center;">
					<div class="demo-card-square2 mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title mdl-card--expand"></div>
						<div class="mdl-card__supporting-text totDonations">
							<h2 class="mdl-card__title-text">Total collected this Month</h2>
							<br /> $ {{$totAmountMonth}}<br />
						</div>
					</div>

				</div>

			</div>
			<div class="row"
				style="background-color: white; border: 1px solid #cccccc; width: 100%">

				<h3>Hall of fame - best donors (top 3)</h3>

				@foreach ($topThree as $donor)

				<div class="users-list-action mdl-list">
					<div class="mdl-list__item">
						<span class="mdl-list__item-primary-content"> <i
							class="material-icons mdl-list__item-avatar">person</i> <span>
							<strong>{{$donor->firstName}} {{$donor->lastName}}</strong> donated totally
							<strong>$ {{$donor->sumAmount}} </strong>
							</span>
						</span><i class="material-icons">star</i>
					</div>

				</div>
				@endforeach
				
				
			</div>

			<h3>Daily totals for all donations</h3>

			<canvas id="myChart" width="400" height="400"></canvas>

			<script>
				var ctx = document.getElementById('myChart').getContext('2d');
				var myChart = new Chart(ctx, {
					type : 'bar',
					data : {
						labels : [ {!!$daysChart!!} ],
						datasets : [ {
							label : 'daily totals for all donations',
							data : [ {!!$valChart!!} ],
							borderWidth : 1
						} ]
					},

				});
			</script>
			<div>
				<a href="/" style="font-weight: bold">Back to main page</a> | <a
					href="/donate" style="font-weight: bold">Donate</a>
			</div>

		</div>
	</div>
</body>
</html>