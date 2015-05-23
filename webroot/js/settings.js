/**
 * @fileoverview FrameSettings Controller JavaScript
 * @author nakajimashouhei@gmail.com (Shohei Nakajima)
 */


/**
 * FrameSettings Controller Javascript
 *
 * @param {string} Controller name
 * @param {function($scope)} Controller
 */
NetCommonsApp.controller('FrameSettings', function($scope) {

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
    $scope.frame.header_type = headerType;
    $('#FrameHeaderType')[0].value = headerType;
  };
});
