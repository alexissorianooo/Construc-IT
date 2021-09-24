//for createform
var inputID;
var divID;
var idnum=0;
var divnum=0;

var delbuttonnum=0;
var delbuttonnum2=0;

var counterpls;

var input;

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
    delbuttonnum2++;
    
    var down = document.getElementById("additional_cell");
    
    var div = document.createElement("div");
    div.setAttribute("class", "fordivID");
    div.id="additional_div"+divnum;
    divID = div.id;
    
    var label = div.appendChild(document.createElement("label"));
    label.setAttribute("class", "text-left");
    label.setAttribute("style", "width: 100%");
    
    input = label.appendChild(document.createElement("input"));
    input.setAttribute("class", "form-control d-inline forID");
    input.setAttribute("type", "text");
    input.setAttribute("style", "border-style: none;color: rgb(0,0,0);max-width: 71%;height: 52px; margin: 0px;");
    input.setAttribute("placeholder", "New Activity " +idnum);
    // input.setAttribute("name", "input_name"+idnum);
    // input.setAttribute("id", "additional_input"+idnum);
    // inputID = "additional_input"+idnum;
    input.name="additional_name"+delbuttonnum2;
    input.id= "additional_input"+idnum;
    inputID = input.name;
    console.log(input.name);
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
    button1.setAttribute("onclick", "deleteInput(this.id);");

    
    var icon1 = button1.appendChild(document.createElement("i"));
    icon1.setAttribute("class", "fa fa-trash-o float-right align-items-center align-content-center");
    icon1.setAttribute("style", "font-size: 38px;color: #000000; max-width: 67px;");


    
    down.appendChild(div);
    // console.log(delbuttonnum2);
    buttoncounter();
    

}




function deleteInput(id){
    var delbuttoncounter=0;

    // .match(/(\d+)/); for extracting nmbers from string
//     var delbuttonID = document.getElementById(id).id;
//     console.log(delbuttonID);
//     // var delbuttonID2 = document.getElementById().id;
    

    
    var matches = id.match(/(\d+)/);
    // console.log(id);
    // console.log(matches);
    
    var getdelbuttonnumber = matches[0];

    for (var i = 0; i<delbuttonnum2; i++){
        var divIdentify = document.getElementsByClassName("fordivID")[i].id;
        
        if (divIdentify.indexOf(getdelbuttonnumber)==14){
            var deleteDiv = document.getElementById(divIdentify); 
            // console.log(deleteDiv);
            // console.log(divIdentify);
            deleteDiv.remove();
            delbuttoncounter++;
            delbuttonremaining=delbuttonnum2-delbuttoncounter;
            delbuttonnum2=delbuttonremaining;
            // console.log(delbuttonnum2);
            counterpls.setAttribute("value", delbuttonnum2);
            // console.log(counterpls.value);
            
            buttoncounter();
        }
    }
    

    
}

function inputRename(){ //for loop fr renaming input boxes
    var num=0;
    for (var x=0; x<delbuttonnum2;x++){
        var test = document.getElementsByClassName("forID")[x].id;
        // console.log(x);
        num=x+1;
        // console.log(num);
        input.name="additional_name"+num;
    }
}

function buttoncounter(){
    counterpls = document.getElementById("counterID");
    counterpls.setAttribute("value", delbuttonnum2);
    // counter.innerHTML=delbuttonnum2;
    // counterpls.setAttribute("display", "none");
    counterpls.name = "counter";
    // console.log(counterpls.value);
    // console.log(counterpls);


    
    inputRename();
}