;(function () {
    'use strict';
    angular.module('common', [])
        .service('TimeService', [
            '$http',
            'AnswerService',
            function ($http, AnswerService) {
                var me = this;
                me.data = [];
                me.current_page = 1;
                me.get = function (conf) {
                    if (me.pending) return;
                    me.pending = true;
                    conf = conf || {page: me.current_page}
                    $http.post('api/index', conf)
                        .then(function (r) {
                            if (r.data.ret === 1) {
                                if (r.data.data) {
                                    me.data = me.data.concat(r.data.data);
                                    me.data = AnswerService.count_vote(me.data);
                                    me.current_page++;
                                } else {
                                    me.no_more_data = true;
                                }

                            } else {
                                console.log('服务器错误');
                            }
                        }, function () {
                            console.log('服务器错误');
                        })
                        .finally(function () {
                            me.pending = false;
                        })
                }
                me.vote = function (conf) {
                    AnswerService.vote(conf)
                        .then(function (r) {
                            if (r)
                                AnswerService.update_data(conf.id);
                        })
                }
            }
        ])
        .controller('HomeController', [
            '$scope',
            'TimeService',
            'AnswerService',
            function ($scope, TimeService, AnswerService) {
                var $win;
                $scope.Timeline = TimeService;
                TimeService.get();
                $win = $(window);
                $win.on('scroll', function () {
                    if ($win.scrollTop() - ($(document).height() - $win.height()) > -30) {
                        TimeService.get();
                    }
                });
                $scope.$watch(function () {
                    return AnswerService.data;
                }, function (new_data, old_data) {
                    var timeline_data = TimeService.data;
                    for (var k in new_data) {
                        for (var i = 0; i < timeline_data.length; i++) {
                            if (k == timeline_data[i].id) {
                                timeline_data[i] = new_data[k];
                            }
                        }
                    }
                    TimeService.data = AnswerService.count_vote(TimeService.data);
                }, true)
            }
        ])
})();