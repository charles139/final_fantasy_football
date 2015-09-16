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
		<script type="text/javascript">
            var myApp = angular.module('myApp' , ['ngRoute']);//initialize angular app


            myApp.controller('createController' , function($scope, $http)
            {                    
                    // $scope.examples = [{name: 'Charles', city: 'Cupertino'},
                    // 					{name: 'Trevor', city: 'Menlo Park'}
                				// 		];
                	$scope.examples = [];
                	$http({
                		url: '/welcome/players',
                		method: "GET"
                	}).success(function(data){
                		console.log(data);
                		$scope.examples = data;
                	});
                  
                  $scope.login = function(){

                    /*
                    * I got this http request to post data to Codeigniter
                    * we need to use JSON.stringify on the form data 
                    * to make it readable by Codeigniter
                    *
                    * For errors with login and registration
                    * We can use Angular validations to check that the form is complete,
                    * so we would only need an error if the email is already in the system 
                    * on registration and an error if the user doesn't exist on login
                    * we can just use data.error to handle that error
                    */

                    var request = $http({
                      method: "post",
                      url: '/welcome/login',
                       data: 'formdata=' + JSON.stringify({
                          email: "Trevor",
                          pass: "Password"
                      }),
                      dataType: 'json',
                      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    });

                    request.success(function(data){

                      console.log(data);
                      
                      if(data.error){
                        console.log(data.error);
                      }
                      
                    });

                  }

                	// console.log($scope.examples);
                    $scope.addSurvey = function(){
                    createFactory.addSurvey($scope.newSurvey , function(data){
                        $scope.new_survey = data;
                        $scope.newSurvey = {};
                    });
                }
            });

        </script>
	</head>
	<body ng-app='myApp' ng-controller='createController'>
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
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Link</a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" ng-model='filter_name'>
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>
  <!--     <form>
        <input type='text'>
        <button ng-click='login' >Login?</button>
      </form> -->
      <button ng-click='login()' >Login?</button>
		<div>
			<ul ng-repeat='item in examples| filter:filter_name'>
				<li ng-bind='item.Name'></li>
			</ul>
		</div>
    

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>