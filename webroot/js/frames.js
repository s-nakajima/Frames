/**
 * Frames JavaScript
 *
 * @author kteraguchi@commonsnet.org (Kohei Teraguchi)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

// * @copyright Copyright 2014, NetCommons Project
// Invalid JsDoc tag: copyright
NetCommonsApp.controller('FramesController', function($scope, $http) {

  /**
   * scope values
   */
  $scope.deleted = false;

  /**
   * @param {number} frameId
   * @return {void}
   */
  $scope.delete = function(frameId) {
    var message = 'Do you want to delete the frame?\n' +
                  '(It should use defined language.)';

    if (confirm(message)) {
      $http.delete('/frames/frames/' + frameId.toString())
        .success(function(data, status, headers, config) {
            $scope.deleted = true;
          })
        .error(function(data, status, headers, config) {
            alert(status);  // It should be error code
          });
    }
  };
});
