var myApp = angular.module('myApp' , ['ngRoute']);//initialize angular app

myApp.config(function ($routeProvider)//SERVICES ANGULAR route for links to partial views
{
    $routeProvider
    .when('/', {
        templateUrl: '/welcome/load_loginReg'
    })
    .when('/partial2', {
        templateUrl: '/welcome/load_main'
    })
    .otherwise({
        redirectTo: '/'
    });
});

myApp.controller('loginReg' , function($scope, $http)
{
    $scope.examples = [];
    $http({
        url: '/welcome/players',
        method: "GET"
    }).success(function(data){
        console.log(data);
        $scope.examples = data;
    });


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

    $scope.login = function(){
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