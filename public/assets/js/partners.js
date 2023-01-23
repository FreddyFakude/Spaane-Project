//Buttons
function show(elementId) { 
    document.getElementById("inviteATeamBox").style.display="none";
    document.getElementById("acceptedTeamsBox").style.display="none";
    document.getElementById("InvitationAwaitingBox").style.display="none";
    document.getElementById(elementId).style.display="block";
}

//Invite Start up section form duplication
var room = 1;
function add_more() {
 
    room++;
    var objTo = document.getElementById('add_more')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="row"><div class="col-md-4 offset-md-4"><div class="row"><div class="col-sm-12"><div class="form-group"><input type="text" name="name" class="form-control" placeholder=" Name"></div></div></div><div class="row"><div class="col-sm-12"><div class="form-group"><input type="email" name="email" class="form-control" placeholder=" Email address"></div></div></div><div class="row"><div class="col-sm-12"><div class="form-group text-right"><button type="button" class="btn btn-sm btn-remove" onclick="remove_add_more('+ room +');"><span class="far fa-trash-alt" aria-hidden="true"></span><span class="letters">Remove</span></button></div></div></div>';
    
    objTo.appendChild(divtest)
}
   function remove_add_more(rid) {
	   $('.removeclass'+rid).remove();
}
