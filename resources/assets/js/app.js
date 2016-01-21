/**
 * Created by guilherme on 21/01/16.
 */

var app = angular.module('app',['ngRoute','app.controllers']);

angular.module('app.controllers', []);

app.config(function ($routeProvider) {
   $routeProvider
       .when('/login',{
           templateUrl: 'build/views/login.html',
           controller: 'LoginController'
       })
       .when('/home',{
           teamplateUrl: 'build/views/home.html',
           controller: 'HomeController'
       })
});