
function addMachine() {
var w = 480, h = 340;

  if (window.screen) {
    w = screen.availWidth;
    h = screen.availHeight;
  }

  var popW = 600, popH = 300;
  var leftPos = (w-popW)/2, topPos = (h-popH)/2;

  window.open('add_machine.html','windowName','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);

  if (!windowReference.opener)
    windowReference.opener = self;
}

function closeWin() {
    window.close();
}

function removeMachine() {
var w = 480, h = 340;

  if (window.screen) {
    w = screen.availWidth;
    h = screen.availHeight;
  }

  var popW = 600, popH = 300;
  var leftPos = (w-popW)/2, topPos = (h-popH)/2;

  window.open('remove_machine.html','windowName','width=' + popW + ',height=' + popH + ',top=' + topPos + ',left=' + leftPos);

  if (!windowReference.opener)
    windowReference.opener = self;

}
