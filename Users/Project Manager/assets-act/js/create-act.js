function addActivity(){

    var down = document.getElementById("divforAddActivity");

    var div1 = document.createElement("div");
    div1.setAttribute("class","col-md-4");
    div1.setAttribute("style", "margin-bottom: 10px;margin-right: 0px;margin-top: 10px;margin-left: 0px;");

    var div2 = div1.appendChild(document.createElement("div"));
    div2.setAttribute("class", "text-center border rounded border-dark shadow");
    div2.setAttribute("style", "width: 100%;border-color: rgb(0,0,0);padding: 10px;");

    var input = div2.appendChild(document.createElement("input"));
    input.setAttribute("class", "text-center");
    input.setAttribute("style", "height: 38px;font-size: 20px;");
    
    div2.appendChild(document.createElement("br"));
    div2.appendChild(document.createElement("br"));

    var select = div2.appendChild(document.createElement("select"));
    select.setAttribute("class", "selectColor ");
    select.setAttribute("onchange", "this.className=this.options[this.selectedIndex].classNamethis.className=this.options[this.selectedIndex].className");
    

    var option1 = document.createElement("option");
    option1.setAttribute("value", "Pending");
    option1.setAttribute("class", "pending-class");
    var displayoption1 = document.createTextNode("Pending")
    option1.appendChild(displayoption1);
    select.appendChild(option1);
    
    var option2 = document.createElement("option");
    option2.setAttribute("value", "Completed");
    option2.setAttribute("class", "completed-class");
    var displayoption2 = document.createTextNode("Completed")
    option2.appendChild(displayoption2);
    select.appendChild(option2);

    var option3 = document.createElement("option");
    option3.setAttribute("value", "Delayed");
    option3.setAttribute("class", "delayed-class");
    var displayoption3 = document.createTextNode("Delayed")
    option3.appendChild(displayoption3);
    select.appendChild(option3);



    down.appendChild(div1);
}

function addActivityDIV(){
    var DIV = document.getElementById("DIVforAdditionalActivity");
    if(DIV.style.display!=="none"){
        DIV.style.display="none";
    }else{
        DIV.style.display="block";
    }
}