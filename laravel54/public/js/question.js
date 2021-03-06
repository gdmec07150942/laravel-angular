;(function () {
    'use strict';
    angular.module('question', [])
        .service('QuestionService', [
            '$state',
            '$http', function ($state, $http) {
                var me = this;
                me.new_question = {};

                me.go_add_question = function () {
                    $state.go('question.add');
                };
                me.read = function (params) {
                    return $http.post('api/question/read', params)
                        .then(function (r) {
                            if (r.ret === 1)
                                me.data = angular.merge({}, me.data, r.data.data);
                            return r.data.data
                        }, function () {

                        })
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
        .controller('QuestionController', [
            '$scope',
            'QuestionService',
            function ($scope, QuestionService) {
                $scope.Question = QuestionService;
            }
        ])
        .controller('QuestionAddController', [
            '$scope',
            'QuestionService', function ($scope, QuestionService) {
            }
        ])
        .controller('QuestionDetailController', [
            '$scope',
            '$stateParams',
            'QuestionService',
            function ($scope, $stateParams,QuestionService) {
               QuestionService.read($stateParams);
            }
        ])
})();