//for header change

function change(name) {
    var title = name;
    if (title==="brick"){
        document.getElementById("changetitle").innerHTML="Brick Calculator";
    }
    if (title==="cement"){
        document.getElementById("changetitle").innerHTML="Cement Calculator";
    }
    if (title==="concrete"){
        document.getElementById("changetitle").innerHTML="Concrete Calculator";
    }
    if (title==="sand"){
        document.getElementById("changetitle").innerHTML="Sand Calculator";
    }
    if (title==="gravel"){
        document.getElementById("changetitle").innerHTML="Gravel Calculator";
    }
    if (title==="rebar"){
        document.getElementById("changetitle").innerHTML="Rebar Calculator";
    }
}

// for div change
let currentDIV = "none";

$(document).ready(function(){
    $("#brick").click(function(){
        $(currentDIV).css("display","none");
        $("#brickDIV").css("display","block");
        currentDIV = "#brickDIV";
        console.log(currentDIV);
    });
    $("#cement").click(function(){
        $(currentDIV).css("display","none");
        $("#cementDIV").css("display","block");
        currentDIV = "#cementDIV";
        console.log(currentDIV);
    });
    $("#concrete").click(function(){
        $(currentDIV).css("display","none");
        $("#concreteDIV").css("display","block");
        currentDIV = "#concreteDIV";
        console.log(currentDIV);
    });
    $("#sand").click(function(){
        $(currentDIV).css("display","none");
        $("#sandDIV").css("display","block");
        currentDIV = "#sandDIV";
        console.log(currentDIV);
    });$("#gravel").click(function(){
        $(currentDIV).css("display","none");
        $("#gravelDIV").css("display","block");
        currentDIV = "#gravelDIV";
        console.log(currentDIV);
    });$("#rebar").click(function(){
        $(currentDIV).css("display","none");
        $("#rebarDIV").css("display","block");
        currentDIV = "#rebarDIV";
        console.log(currentDIV);
    });
});