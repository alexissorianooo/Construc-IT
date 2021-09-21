//for createform
var inputID;
var divID;
var idnum=0;
var divnum=0;

var delbuttonnum=0;

// FOR CHECKING
function getID(){
    var x = document.getElementsByClassName("forID")[0].id;
    console.log(x);
}


function toggleEnable(id){
    var textbox = document.getElementById(id);
    // console.log(textbox.value);
    // console.log(id);
    if(textbox.disabled){
        document.getElementById(id).disabled = false;
    }else{
        document.getElementById(id).disabled = true;
    }
}

//for creating additional forms

function createForm(){
    
    idnum++;
    divnum++;
    
    delbuttonnum++;
    
    var down = document.getElementById("additional_cell");
    
    var div = document.createElement("div");
    div.setAttribute("class", "fordivID");
    div.id="additional_div"+divnum;
    divID = div.id;
    
    var label = div.appendChild(document.createElement("label"));
    label.setAttribute("class", "text-left");
    label.setAttribute("style", "width: 100%");
    
    var input = label.appendChild(document.createElement("input"));
    input.setAttribute("class", "form-control d-inline forID");
    input.setAttribute("type", "text");
    input.setAttribute("style", "border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px; margin: 0px");
    input.setAttribute("placeholder", "New Activity " +idnum);
    // input.setAttribute("id", "additional_input"+idnum);
    // inputID = "additional_input"+idnum;
    input.id= "additional_input"+idnum;
    inputID = input.id;
    console.log(inputID);
    // input.disabled=true;
    
    
    //DELETE BUTTON
    var button1 = label.appendChild(document.createElement("button"));
    button1.setAttribute("class", "btn btn-primary float-right activityButton getButtonID");
    //getButtonID for getting ID
    
    button1.setAttribute("type", "button");
    button1.setAttribute("style","height: 53px;background: var(--white);color: var(--dark);border-width: 0px;margin: 1px;max-width: 67px;");
    
    button1.id ="delbutton"+delbuttonnum; //ID
    delbuttonID = button1.id; //ID
    
    // button1.setAttribute("onclick", "deleteInput(divID, delbuttonID)"); //ACTION
    button1.setAttribute("onclick", "deleteInput(this.id)");
    
    var icon1 = button1.appendChild(document.createElement("i"));
    icon1.setAttribute("class", "fa fa-trash-o float-right align-items-center align-content-center");
    icon1.setAttribute("style", "font-size: 38px;color: #000000; max-width: 67px;");
    
    
    //EDIT BUTTON
    // var button2 = label.appendChild(document.createElement("button"));
    // button2.setAttribute("class", "btn btn-primary float-right activityButton");
    // button2.setAttribute("type", "button");
    // button2.setAttribute("style", "height: 53px;width: 67px;color: var(--white);background: var(--white);border-width: 0px;margin: 1px;");
    
    // button2.setAttribute("onclick", "toggleEnable(inputID)");
    // // button2.setAttribute("onclick", "getID()");
    
    // var icon2 = button2.appendChild(document.createElement("i"));
    // icon2.setAttribute("class", "fa fa-edit float-right align-items-center align-content-center");
    // icon2.setAttribute("style", "font-size: 38px;color: #000000;");
    
    
    down.appendChild(div);
}

function deleteInput(id){
    var counter = 1;
    counter++;
    // .match(/(\d+)/); for extracting nmbers from string
//     var delbuttonID = document.getElementById(id).id;
//     console.log(delbuttonID);
//     // var delbuttonID2 = document.getElementById().id;
    
//     // console.log(delbuttonID2);
    
    var matches = id.match(/(\d+)/);
    console.log(id);
    // console.log(matches);
    
    var getdelbuttonnumber = matches[0];
    console.log(getdelbuttonnumber); // get thebutton number
    
    
//     var divIdentify = document.getElementsByClassName("fordivID")[getdelbuttonnumber-1].id;
        
//     console.log(divIdentify);


    // var deleteDiv = document.getElementById(divIdentify); 
    // console.log(deleteDiv);
    
    for (var i = 0; i<delbuttonnum; i++){
        var divIdentify = document.getElementsByClassName("fordivID")[i].id;
        console.log(divIdentify);
        // console.log(divIdentify.indexOf(getdelbuttonnumber));
        if (divIdentify.indexOf(getdelbuttonnumber)==14){
            var deleteDiv = document.getElementById(divIdentify); 
            deleteDiv.remove();
        }
    }
    
    
    // deleteDiv.remove();
    
    // var divIdentify = document.getElemenById(divnum);
    
    
}
