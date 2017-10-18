(function (root, angular) {
    // our Angular-independent Javascript stuff - lazy init in case exists
    root.App = root.App || {};

    angular.module("app", ["angular-loading-bar", "ngResource"]);

    // catch unload events and silence errors to avoid looking stupid
    window.onbeforeunload = function (e) {
        root.App.unloading = true;
    };
})(window, window.angular);
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
(function(angular) {
    "use strict";

    angular.module('app')
        .service('DashboardService', ['$resource', DashboardService]);

    function DashboardService($resource) {
        return $resource('/api/dashboard', {}, {
            query: {
                method: 'GET',
                isArray: false
            }
        });
    }
})(window.angular);
//# sourceMappingURL=app.js.map
