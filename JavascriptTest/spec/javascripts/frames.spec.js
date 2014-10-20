describe('frames', function() {
  var $httpBackend, createController;

  beforeEach(module('NetCommonsApp'));

  beforeEach(inject(function($injector) {
    $httpBackend = $injector.get('$httpBackend');

    var $controller = $injector.get('$controller');
    $scope = {};
    createController = function() {
      return $controller('FramesController', {'$scope' : $scope});
    };

  }));

  afterEach(function() {
    $httpBackend.verifyNoOutstandingExpectation();
    $httpBackend.verifyNoOutstandingRequest();
  });

  it('should be false deleted value', inject(function() {
    var controller = createController();
    expect($scope.deleted).toBe(false);
  }));

  it('should confirm frame delete', inject(function($injector) {
    var dialogs = $injector.get('dialogs');
    var modalInstance = {
      result: {
        then: function(confirmCallback) {
          this.confirmCallBack = confirmCallback;
        }
      },
      close: function(item) {
        this.result.confirmCallBack(item);
      }
    };
    //dialogs.confirm(undefined, undefined);

    spyOn(dialogs, 'confirm').andReturn(modalInstance);

    $httpBackend.expectDELETE('/frames/frames/1').respond(200, '');

    var controller = createController();
    $scope.delete(1);
    modalInstance.close('yes');

    $httpBackend.flush();
    expect($scope.deleted).toBe(true);
  }));

});
