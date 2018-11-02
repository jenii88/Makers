function myFunction() {
var ID = document.getElementById("ID").value;
var name = document.getElementById("name").value;
var equipment = document.getElementById("equipment").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = '&ID1=' + ID + '&name1=' + name + '&equipment1=' + equipment;
if (ID == '' || name == '' || equipment == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "newInsert.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}