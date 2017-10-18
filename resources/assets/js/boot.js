(function (root, angular) {
    // our Angular-independent Javascript stuff - lazy init in case exists
    root.App = root.App || {};

    angular.module("app", ["angular-loading-bar", "ngResource"]);

    // catch unload events and silence errors to avoid looking stupid
    window.onbeforeunload = function (e) {
        root.App.unloading = true;
    };
})(window, window.angular);