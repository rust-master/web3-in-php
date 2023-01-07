<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Potenza - Job Application Form Wizard with Resume upload and Branch feature">
	<meta name="author" content="Ansonika">
	<title>Web3 in PHP pages</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
		href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
		href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="../css?family=Work+Sans:400,500,600" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles.css" />

</head>

<body>
	<div class="container-fluid">
		<div class="row row-height">
			<div class="col-xl-4 col-lg-4 content-left">
				<div class="content-left-wrapper">
					<a href="index.php" id="logo"><img src="img/logo.png" alt="" width="45" height="45"></a>
					<div id="social">
						<ul>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-google"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
						</ul>
					</div>
					<!-- /social -->
					<div>
						<figure><img src="img/info_graphic_1.svg" alt="" class="img-fluid" width="270" height="270">
						</figure>
						<h2>Blockchian testing page</h2>
						<p>Testing purchase templates</p>

						<a href="#start" class="btn_1 rounded mobile_btn yellow">Start Now!</a>
					</div>
					<div class="copy">© 2022 </div>
				</div>
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->
			<div class="col-xl-8 col-lg-8 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
						<span id="location"></span>
						<div id="progressbar"></div>
						<button id="connect-button">Connect Metamask</button>
						<button id="send-button">Donate</button>
					</div>

					<!-- Web3 Script -->
					<script>
						let account;

						document.getElementById('connect-button').addEventListener('click', event => {
							let button = event.target;
							ethereum.request({ method: 'eth_requestAccounts' }).then(accounts => {
								account = accounts[0];
								console.log(account);
								button.textContent = account;

								ethereum.request({ method: 'eth_getBalance', params: [account, 'latest'] }).then(result => {
									console.log(result);
									let wei = parseInt(result, 16);
									let balance = wei / (10 ** 18);
									console.log(balance + " ETH");
								});
							});
						});

						if (true) {
							document.getElementById('send-button').addEventListener('click', event => {
								let transactionParam = {
									to: '0x45B6b39e1Cf8A6b4Ff2720f6BA0089d4574126E5',
									from: account,
									value: '0x38D7EA4C68000'
								};

								ethereum.request({ method: 'eth_sendTransaction', params: [transactionParam] }).then(txhash => {
									console.log(txhash);
									checkTransactionconfirmation(txhash).then(r => alert(r));
								});
							});
						}
						function checkTransactionconfirmation(txhash) {

							let checkTransactionLoop = () => {
								return ethereum.request({ method: 'eth_getTransactionReceipt', params: [txhash] }).then(r => {
									if (r != null) return 'confirmed';
									else return checkTransactionLoop();
								});
							};

							return checkTransactionLoop();
						}


					</script>

					<!-- /top-wizard -->
					<form enctype="multipart/form-data" id="myForm">
						<input id="website" name="website" type="text" value="">
						<!-- Leave for security protection, read docs for details -->
						<div id="middle-wizard">
							<div class="step">
								<h2 class="section_title">Presentation</h2>
								<div class="form-group add_top_30">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" class="form-control required" required>
								</div>
								<div class="form-group">
									<label for="email">payment</label>
									<input type="number" name="payment" id="payment" class="form-control required"
										required>
								</div>
								<div class="form-group">
									<label for="phone">Merchant Id</label>
									<input type="text" name="m_id" id="m_id" class="form-control required" required>
								</div>
								<div class="form-group add_bottom_30">
									<label for="minimum_salary_full_time">Choose Status of Payment</label>
									<div class="styled-select">
										<select class="form-control required" id="p_status" name="p_status" required>
											<option value="">Choose Status</option>
											<option value="0">Received</option>
											<option value="1">Pending</option>
											<option value="2">Failed</option>
										</select>
									</div>
								</div>
							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard">
								<button class="submit" type="button" id="button">Submit</button>
							</div>
							<div class="form-group add_bottom_30">
								<label for="minimum_salary_full_time">
									<ul id="comment"></ul>
								</label>
							</div>
							<!-- /bottom-wizard -->
					</form>
				</div>
				<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->



	</div>
	<!-- /.modal -->


	<!-- Wizard script-->

	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
	<script src="js/func_1.js"></script>
	<script type="text/javascript">
		$(document).ready(
			function () {

				/*  add data */
				$("#button").click(function () {


					var name = $("#name").val();
					var payment = $("#payment").val();
					var m_id = $("#m_id").val();
					var p_status = $("#p_status").val();



					if ((name == "") || (payment == "") || (m_id == "") || (p_status == "")) {
						alert("please enter/Select value");
						return false;
					}

					$.ajax(
						{
							type: "post",
							url: "process.php",
							data: "name=" + name + "&payment=" + payment + "&m_id=" + m_id + "&p_status=" + p_status + "&action=addcomment",
							success: function (data) {

								document.getElementById("myForm").reset();
								$("#comment").html(data);
								showComment();
							}

						}
					);

				});

			});
	</script>

</body>

</html>