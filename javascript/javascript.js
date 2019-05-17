console.log("external js is working");
function reloadCompletedTable(r){
	document.getElementById('completedProjectsInput').innerHTML = r;
}
function reloadInProgressTable(r){
	document.getElementById('inProgressProjectsInput').innerHTML = r;
}
function reloadTables(){
	$.post("backend/getCompletedProjects.php", reloadCompletedTable);
	$.post("backend/getInProgressProjects.php", reloadInProgressTable);
	$.post("backend/testButton.php", insertTestButton);
}
function insertTestButton(r){
	document.getElementById('testButtonInput').innerHTML=r;
}
//DOCUMENT READY
$(document).ready(function (){
	//testButtonInput
	console.log("posted to php");
	reloadTables();
})
function completeClicked(r){
	console.log("complete clicked");
	console.log(r);
	$.post('backend/completeProject.php', {completeId:r}, function (r) {
		reloadTables();
	})
}
function uncompleteClicked(r){
	console.log("uncomplete clicked");
	console.log(r);
	$.post('backend/uncompleteProject.php', {completeId:r}, function (r) {
		reloadTables();
	})
}
$("#editProject").submit(function(e){
	// Stop the form from submitting so we can do it via AJAX
	e.preventDefault();

	$.post('backend/editProject.php', $('#editProject').serialize(), function (r) {
		document.getElementById('editProjectID').value='';
		document.getElementById('editProjectTitle').value='';
		document.getElementById('editProjectDescription').value='';
		reloadTables();
	})
});
