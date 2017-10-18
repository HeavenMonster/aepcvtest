(function (angular) {
    "use strict";

    angular.module("app")
        .controller("DashboardController", ["$scope", "DashboardService", DashboardController]);

    function DashboardController($scope, DashboardService) {

        var vm = this;

        vm.initController = function() {
            DashboardService.query({}, function(response) {
                vm.entity = response;
            });
        };
    }

})(window.angular);