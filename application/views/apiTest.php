<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Final Fantasy League</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src='application/views/ng/script/app.js'></script>
    <script src='application/views/ng/script/loginreg.js'></script>
		<script type="text/javascript">
            

            myApp.config(function ($routeProvider)//SERVICES ANGULAR route for links to partial views
            {
                $routeProvider
                .when('/', {
                    templateUrl: '/welcome'
                })
                // .when('/partial2', {
                //     templateUrl: 'partials/main.html'
                // })
                // .when('/partial3', {
                //     templateUrl: 'partials/show.html'
                // })
                // .when('/partial4', {
                //     templateUrl: 'partials/update.html'
                // })
                .otherwise({
                    redirectTo: '/'
                });
            });

        </script>
	</head>
	<body ng-app='myApp' ng-controller='loginReg'>
		<?php 
			// var_dump($json);
		 ?>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Brand</a>
				</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" ng-model='filter_name'>
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>
      <button ng-click='login()' >Login?</button>
      <div ng-view=''></div>
		<div>
			<ul ng-repeat='item in examples| filter:filter_name'>
				<li ng-bind='item.Name'></li>
			</ul>
		</div>
    

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>