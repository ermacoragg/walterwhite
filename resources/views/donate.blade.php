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
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

<script src="/js/app.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
	<div class="flex-center" id="flex">
		<div class="content">
			<h1>Save Walter White</h1>
			<h3>Father, Husband and Teacher</h3>
			<h3>Donate</h3>
			<div class="row"
				style="background-color: white; border: 1px solid #cccccc;">
				<div class="column" style="text-align: center;">
					<div class="theader">YOUR DETAILS</div>
					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="firstName">
						<label class="mdl-textfield__label" for="sample1">First
							Name</label>
					</div>
					<br />
					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="lastName">
						<label class="mdl-textfield__label" for="sample1">Last
							Name</label>
					</div>
					<br />
					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="email">
						<label class="mdl-textfield__label" for="sample1">E-mail</label>
					</div>
					<br />
					<div class="mdl-textfield mdl-js-textfield">
						<textarea class="mdl-textfield__input" type="text" rows="3"
							id="comment"></textarea>
						<label class="mdl-textfield__label" for="sample5">Leave a
							comment for Walter...</label>
					</div>
				</div>
				<div class="column"
					style="background-color: white; text-align: center;">
					<div class="theader">YOUR DONATION</div>
					<br />
					<div id="donateAmount">10 $</div>

					<input class="mdl-slider mdl-js-slider" type="range" min="10"
						max="1000" value="10" tabindex="0" step="10"
						onchange="donateRefresh()" id="amount"> <br /> <img
						src="/images/withoutshadow.png" style="width: 95%" /> <br />
					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="cardNumber"
							pattern="-?[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}?"> <label
							class="mdl-textfield__label" for="sample1">Card number</label> <span
							class="mdl-textfield__error">Input is not a number!</span>
					</div>
					<br />
					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"
						style="width: 40%">
						<input class="mdl-textfield__input" type="text" id="expiration"
							pattern="-?[0-9]{2}\/[0-9]{2}?" placeholder="01/25"> <label
							class="mdl-textfield__label" for="expiration">Expiration
							date</label> <span class="mdl-textfield__error">Input is not a a
							valid expire date!</span>
					</div>
					<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"
						style="width: 40%">
						<input class="mdl-textfield__input" type="text" id="cvv"
							pattern="-?[0-9]{3}?"> <label
							class="mdl-textfield__label" for="sample1">CVV</label> <span
							class="mdl-textfield__error">Input is not a a valid CVV!</span>
					</div>
				</div>
				<div>
					<button style="margin: 15px;" id="donateDo"
						class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
						DONATE</button>
				</div>

			</div>
			<div>
				<a href="/" style="font-weight: bold">Back to main page</a> | <a
					href="/statistics" style="font-weight: bold">Statistics</a>
			</div>
		</div>
	</div>
	<div id="success" class="modal">
		<p>
		<h3>Thank you for your donation!</h3>
		</p>
		<p>
			<strong>God bless you!</strong> <br /> If you wish to see the
			donation statistics, please <a href="/statistics">click here</a>
		</p>
		<div class="flex-center" id="flex">
			<button style="margin: 15px;"
				class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
				id="closeModal">CLOSE</button>
		</div>
	</div>
	<div id="failure" class="modal">
		<p>
		<h3>Something went wrong!</h3>
		</p>
		<p>
			<strong>Something failed!</strong>
		</p>
		<div class="flex-center" id="flex">
			<button style="margin: 15px;"
				class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
				id="closeModalError">CLOSE</button>
		</div>
	</div>
</body>
</html>