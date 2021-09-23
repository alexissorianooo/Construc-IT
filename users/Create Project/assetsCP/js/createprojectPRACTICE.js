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
    if(textbox.disabled){
        document.getElementById(id).disabled = false;
    }else{
        document.getElementById(id).disabled = true;
    }
}




//for creating additional forms

var additionaldata = new Array();
var xy;

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
    input.setAttribute("style", "border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px; margin: 0px;");
    input.setAttribute("placeholder", "New Activity " +idnum);
    input.name="additional_name"+idnum;
    input.id= "additional_input"+idnum;
    inputID = input.name;
    console.log(input.name);
        
   
    //DELETE BUTTON
    var button1 = label.appendChild(document.createElement("button"));
    button1.setAttribute("class", "btn btn-primary float-right activityButton getButtonID");
    //getButtonID for getting ID
    
    button1.setAttribute("type", "button");
    button1.setAttribute("style","height: 53px;background: var(--white);color: var(--dark);border-width: 0px;margin: 1px;max-width: 67px;");
    
    button1.id ="delbutton"+delbuttonnum; //ID
    delbuttonID = button1.id; //ID
    
    // button1.setAttribute("onclick", "deleteInput(divID, delbuttonID)"); //ACTION
    // button1.setAttribute("onclick", "deleteInput(this.id); remove_element("+additionaldata.indexOf(additionaldata[xy])+")");
    for (xy=0;xy<additionaldata.length;xy++){
        button1.setAttribute("onclick", "remove_element("+additionaldata.indexOf(additionaldata[xy])+")");
    }
    // button1.setAttribute("onclick", "deleteInput(this.id); remove_element(additionaldata.indexOf(this.id))");
    // button1.setAttribute("onclick", "deleteInput(this.id)");

    
    var icon1 = button1.appendChild(document.createElement("i"));
    icon1.setAttribute("class", "fa fa-trash-o float-right align-items-center align-content-center");
    icon1.setAttribute("style", "font-size: 38px;color: #000000; max-width: 67px;");
    down.appendChild(div);

    additionaldata.push(inputID);
    console.log(additionaldata);
    console.log(additionaldata.length);
    console.log(additionaldata.indexOf(this.id));

    
}

function deleteInput(id){
    
    var matches = id.match(/(\d+)/);
    console.log(id);
    // console.log(matches);
    
    var getdelbuttonnumber = matches[0];
    console.log(getdelbuttonnumber); // get thebutton number
    
    for (var i = 0; i<delbuttonnum; i++){
        var divIdentify = document.getElementsByClassName("fordivID")[i].id;
        console.log(divIdentify);
        // console.log(divIdentify.indexOf(getdelbuttonnumber));
        if (divIdentify.indexOf(getdelbuttonnumber)==14){
            var deleteDiv = document.getElementById(divIdentify); 
            deleteDiv.remove();
        }
    }
    
}

function remove_element(index_no){
    var something = additionaldata.splice(index_no,1);
    console.log(something);
    // console.log(additionaldata);
    document.getElementById(something).remove();
    
}
