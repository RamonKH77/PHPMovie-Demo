var lng=document.getElementById("Language");
var acc=document.getElementById("Accent");

lng.addEventListener("click", function() {
    if(lng.value == "Russian")
    {
        addActivityItem("R");
    }else if(lng.value=="English"){
    	addActivityItem("E");
    }
});

function addActivityItem(x) {
    
    if(x=="R"){
    	acc.disabled = true;
    	//console.log("R")
    }
    else if(x=="E"){
    	acc.disabled = false;
    	//console.log("E")
    }
}