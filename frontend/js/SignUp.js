var app = angular.module('signupApp', []);
app.controller('signupController', function($scope) {
    $scope.master = {firstName:"John", lastName:"Doe"};
    $scope.reset = function() {
        $scope.firstName = '';
        $scope.lastName = '';
        $scope.email = '';
        $scope.nationalId = '';
        $scope.password = '';
        $scope.confirmPassword = '';
        $scope.firstName = '';

        $("#photo").replaceWith($("#photo").val('').clone(true));
    };
    $scope.reset();
});