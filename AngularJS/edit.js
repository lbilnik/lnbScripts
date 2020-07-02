function InlineEditorController($scope){


	$scope.showtooltip = false;
	$scope.value = 'Edit me.';


	$scope.hideTooltip = function(){

		$scope.showtooltip = false;
	}

	$scope.toggleTooltip = function(e){
		e.stopPropagation();
		$scope.showtooltip = !$scope.showtooltip;
	}
}


var required = element(by.binding('form.input.$error.required'));
var model = element(by.binding('model'));
var input = element(by.id('input'));

it('should set the required error', function() {
  expect(required.getText()).toContain('true');

  input.sendKeys('123');
  expect(required.getText()).not.toContain('true');
  expect(model.getText()).toContain('123');
});

