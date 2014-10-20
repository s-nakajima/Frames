/**
 * Frames JavaScript
 *
 * @author kteraguchi@commonsnet.org (Kohei Teraguchi)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

// * @copyright Copyright 2014, NetCommons Project
// Invalid JsDoc tag: copyright

NetCommonsApp.requires.push('dialogs.main');
NetCommonsApp.controller('FramesController', function($scope, $http, dialogs) {

  /**
   * scope values
   */
  $scope.deleted = false;

  /**
   * @param {number} frameId
   * @return {void}
   */
  $scope.delete = function(frameId) {
    var message = 'Do you want to delete the frame?<br />' +
                  '(It should use defined language.)';
    dialogs.confirm(undefined, message)
      .result.then(
        function(yes) {
          $http.delete('/frames/frames/' + frameId.toString())
            .success(function(data, status, headers, config) {
                $scope.deleted = true;
              })
            .error(function(data, status, headers, config) {
                alert(status);  // It should be error code
              });
        });
  };
});
