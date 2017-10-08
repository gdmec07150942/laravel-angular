;(function () {
    'use strict';
    angular.module('xiaohu', ['ui.router'])
        .config(function ($interpolateProvider, $stateProvider, $urlRouterProvider) {
            $interpolateProvider.startSymbol('[:');
            $interpolateProvider.endSymbol(':]');
            $urlRouterProvider.otherwise('/home');
            $stateProvider
                .state('home', {
                    url: '/home',
                    templateUrl: 'home.tpl'
                })
                .state('login', {
                    url: '/login',
                    templateUrl: 'login.tpl'
                })
        })
    /*以上是设置了xiaohu这个模块上的变量符号为[::]，避免跟laravel的{{}}冲突*/
})();