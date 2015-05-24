/**
 * Frames JavaScript
 *
 * @author kteraguchi@commonsnet.org (Kohei Teraguchi)
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */


/**
 * FramesController Controller Javascript
 *
 * @param {string} Controller name
 * @param {function($scope)} Controller
 */
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


/**
 * FrameSettings Controller Javascript
 *
 * @param {string} Controller name
 * @param {function($scope)} Controller
 */
NetCommonsApp.controller('FrameSettingsController', function($scope) {

  /**
   * frame
   *
   * @type {object}
   */
  $scope.frame = {};

  /**
   * initialize
   *
   * @return {void}
   */
  $scope.initialize = function(data) {
    $scope.frame = data.frame;
  };

  /**
   * Select of header type
   *
   * @return {void}
   */
  $scope.selectHeaderType = function(headerType) {
    $scope.frame.headerType = headerType;
    $('#FrameHeaderType')[0].value = headerType;
  };
});
