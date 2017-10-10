;(function () {
    'use strict';
    angular.module('xiaohu', ['ui.router'])
        .config(['$interpolateProvider',
            '$stateProvider',
            '$urlRouterProvider', function ($interpolateProvider, $stateProvider, $urlRouterProvider) {
                $interpolateProvider.startSymbol('[:');
                $interpolateProvider.endSymbol(':]');
                /*以上是设置了xiaohu这个模块上的变量符号为[::]，避免跟laravel的{{}}冲突*/
                $urlRouterProvider.otherwise('/home');
                $stateProvider
                    .state('home', {
                        url: '/home',
                        templateUrl: 'home.tpl'
                    })
                    .state('signup', {
                        url: '/signup',
                        templateUrl: 'signup.tpl'
                    })
                    .state('login', {
                        url: '/login',
                        templateUrl: 'login.tpl'
                    })
                    .state('question', {
                        abstract: true,
                        url: '/question',
                        template: '<div ui-view></div>'
                    })
                    .state('question.add', {
                        url: '/add',
                        templateUrl: 'question.add.tpl'
                    })
            }])
        .service('UserService', ['$http', '$state',
            function ($http, $state) {
                var me = this;
                me.signup_data = {};
                me.login_data = {};
                me.signup = function () {
                    $http.post('api/register', me.signup_data)
                        .then(function (r) {
                            if (r.data.ret === 1) {
                                me.signup_data = {};
                                alert(r.data.msg);
                                $state.go('login');
                            }
                        }, function (e) {

                        })
                };
                me.login = function () {
                    $http.post('api/login', me.login_data)
                        .then(function (r) {
                            if (r.data.ret === 1) {
                                $state.go('home');
                                location.href = '/xiaohu/laravel54/public/#!/home';
                            } else {
                                me.login_failed = true;
                            }
                        }, function (e) {

                        })
                }
                me.username_exits = function () {
                    $http.post('api/exit', {username: me.signup_data.username})
                        .then(function (r) {
                            if (r.data.ret === 0) {
                                me.signup_username_exists = true;
                            } else {
                                me.signup_username_exists = false;
                            }
                        }, function (e) {
                            console.log('e', e);
                        })
                }
            }
        ])
        .controller('SignupController', [
            '$scope',
            'UserService',
            function ($scope, UserService) {
                $scope.User = UserService;
                $scope.$watch(function () {
                    return UserService.signup_data;
                }, function (n, o) {
                    if (n.username != o.username) {
                        UserService.username_exits();
                    }
                }, true);
            }
        ])
        .controller('LoginController', [
            '$scope',
            'UserService',
            function ($scope, UserService) {
                $scope.User = UserService;

            }
        ])
        .service('QuestionService', [
            '$state',
            '$http', function ($state, $http) {
                var me = this;
                me.new_question = {};
                me.go_add_question = function () {
                    $state.go('question.add');
                };
                me.add = function () {
                    if (!me.new_question.title) {
                        return;
                    }
                    $http.post('api/question/create', me.new_question)
                        .then(function (r) {
                            if (r.data.ret === 1) {
                                me.new_question = {};
                                alert(r.data.msg);
                                $state.go('home');
                            }
                        }, function (e) {
                            alert(e);
                        })
                }
            }
        ])
        .controller('QuestionAddController', [
            '$scope',
            'QuestionService', function ($scope, QuestionService) {
                $scope.Question = QuestionService;
            }
        ])

})();