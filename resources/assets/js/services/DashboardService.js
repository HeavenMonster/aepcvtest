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