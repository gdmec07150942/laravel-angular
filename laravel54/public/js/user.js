;(function () {
    'use strict';
    angular.module('user', [
        'answer'
    ])
        .service('UserService', ['$http', '$state',
            function ($http, $state) {
                var me = this;
                me.signup_data = {};
                me.login_data = {};
                me.data = {};
                me.islogin = true;
                me.read = function (param) {
                    return $http.post('api/user/read', param)
                        .then(function (r) {
                            if (r.ret === 1)
                                me.data[param.id] = r.data.data;
                            me.current_user = r.data.data;
                        }, function () {

                        })
                };
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
                                me.islogin = false; //这是用来判断是否登录的
                                $state.go('home');
                                location.href = '/xiaohu/laravel54/public/#!/home';
                            } else {
                                me.login_failed = true;
                            }
                        }, function (e) {

                        })
                };
                me.username_exits = function () {
                    $http.post('api/username_exit', {username: me.signup_data.username})
                        .then(function (r) {
                            if (r.data.ret === 1) {
                                me.signup_username_exists = true;
                            } else {
                                me.signup_username_exists = false;
                            }
                        }, function (e) {
                            console.log('e', e);
                        })
                };
                me.email_exits = function () {
                    $http.post('api/email_exit', {email: me.signup_data.email})
                        .then(function (r) {
                            if (r.data.ret === 1) {
                                me.signup_email_exists = true;
                            } else {
                                me.signup_email_exists = false;
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
                    if (n.email != o.email) {
                        UserService.email_exits();
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
        .controller('UserController', [
            '$scope',
            '$stateParams',
            'UserService',
            'AnswerService',
            'QuestionService',
            function ($scope, $stateParams, UserService, AnswerService, QuestionService) {
                $scope.User = UserService;
                console.log('$stateParams', $stateParams);
                UserService.read($stateParams);
                AnswerService.read({user_id: $stateParams.id})
                    .then(function (r) {
                        if (r) {
                            UserService.his_answers = r;
                        }
                    });
                QuestionService.read({user_id: $stateParams.id})
                    .then(function (r) {
                        if (r) {
                            UserService.his_questions = r;
                        }
                    });
            }
        ])
})();  