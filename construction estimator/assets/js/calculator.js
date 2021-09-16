//for header change

function change(name) {
    var title = name;
    var showtitle = document.getElementById("changetitle");
    if (showtitle.style.display === "none")
    {
        showtitle.style.display = "block";
    }
    if (title==="brick"){
        document.getElementById("changetitle").innerHTML="Brick Calculator";
        //brickcal();
    }
    if (title==="metal"){
        document.getElementById("changetitle").innerHTML="Metal Weight Calculator";
        //paintcal();
    }
    if (title==="concrete"){
        document.getElementById("changetitle").innerHTML="Concrete Calculator";
        //concretecal();
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
    if (title==="beam"){
        document.getElementById("changetitle").innerHTML="Beam Load Calculator";
    } 
    if (title==="baluster"){
        document.getElementById("changetitle").innerHTML="Baluster Calculator";
    }  
    if (title==="cement"){
        document.getElementById("changetitle").innerHTML="Cement Calculator";
    }  
    if (title==="wallsquare"){
        document.getElementById("changetitle").innerHTML="Wall Square Calculator";
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
    $("#metal").click(function(){
        $(currentDIV).css("display","none");
        $("#metalDIV").css("display","block");
        currentDIV = "#metalDIV";
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
    $("#beam").click(function(){
        $(currentDIV).css("display","none");
        $("#beamDIV").css("display","block");
        currentDIV = "#beamDIV";
        console.log(currentDIV);
    });
    $("#baluster").click(function(){
        $(currentDIV).css("display","none");
        $("#balusterDIV").css("display","block");
        currentDIV = "#balusterDIV";
        console.log(currentDIV);
    });
    $("#cement").click(function(){
        $(currentDIV).css("display","none");
        $("#cementDIV").css("display","block");
        currentDIV = "#cementDIV";
        console.log(currentDIV);
    });
    $("#wallsquare").click(function(){
        $(currentDIV).css("display","none");
        $("#wallsquareDIV").css("display","block");
        currentDIV = "#wallsquareDIV";
        console.log(currentDIV);
    });
});

// CALCULATIONS

// BRICK CALCULATOR
function brickcal(){

    //declaring variables
    var bricklength, brickheight, brickwidth, mortarjoint, walllength, wallheight, brickswastage, typeofwall;
    
    //get inputs
    var bricklengthJS = document.getElementById("bricklength");
    bricklengthJS.onkeyup = function(){
        console.log(bricklengthJS.value);
        bricklength = bricklengthJS.value;
        brickcal2(); //calculate
    }

    var brickheightJS = document.getElementById("brickheight");
    brickheightJS.onkeyup = function(){
        console.log(brickheightJS.value);
        brickheight = brickheightJS.value;
        brickcal2();
    }

    var brickwidthJS = document.getElementById("brickwidth");
    brickwidthJS.onkeyup = function(){
        console.log(brickwidthJS.value);
        brickwidth = brickwidthJS.value;
        brickcal2()
    }

    var mortarjointJS = document.getElementById("mortarjoint");
    mortarjointJS.onkeyup = function(){
        console.log(mortarjointJS.value);
        mortarjoint = mortarjointJS.value;
        brickcal2();
    }

    var walllengthJS = document.getElementById("walllength");
    walllengthJS.onkeyup = function(){
        console.log(walllengthJS.value);
        walllength = walllengthJS.value;
        brickcal2();
    }

    var wallheightJS = document.getElementById("wallheight");
    wallheightJS.onkeyup = function(){
        console.log(wallheightJS.value);
        wallheight = wallheightJS.value;
        brickcal2();
    }

    var brickswastageJS = document.getElementById("brickswastage");
    brickswastageJS.onkeyup = function(){
        console.log(brickswastageJS.value);
        brickswastage = brickswastageJS.value;
        brickcal2();
    }
    
    //for type of wall - select box
    var typeofwallJS = document.getElementById("typeofwall");
    typeofwallJS.addEventListener('change', function(){
        console.log(typeofwallJS.value);
        typeofwall = typeofwallJS.value;
        brickcal2();
    })

    //calculate inputs
    function brickcal2(){
        

        if (walllength != undefined && wallheight != undefined){
           
            //for area
            wallarea = parseFloat(walllength) * parseFloat(wallheight);
            console.log(wallarea);
            document.getElementById("wallarea").value= wallarea; //display at textbox

            //for the brick computation
            if (brickheight != undefined && bricklength != undefined && mortarjoint != undefined && walllength != undefined && wallheight != undefined){

                        /* 
                            bricks needed = (L * H) / ((l + t) * (h + t)),
                                     L - Length of the wall;
                                     H - Height of the wall;
                                     l - Length of a brick;
                                     t - Thickness of mortar joint; and
                                     h - Height of a brick. 
                        */
               
                // answer for BRICKS NEEDED
                brickcomputation1 = parseFloat(bricklength) + parseFloat(mortarjoint);
                brickcomputation2 = parseFloat(brickheight) + parseFloat(mortarjoint);
                brickcomputation3 =  brickcomputation1 * brickcomputation2;
                brickANS = (wallarea/brickcomputation3) * 1000000;

                //display answers
                console.log(Math.ceil(brickANS));
                document.getElementById("bricksneeded").value = Math.ceil(brickANS);

                //for bricks wastage computation
                brickcal3();

                // FOR DOUBLE TYPE OF WALL
                if (typeofwall==="double"){
                    var temp = brickANS*2;
                    brickANS = temp;

                    //display answers
                    console.log(Math.ceil(brickANS));
                    document.getElementById("bricksneeded").value = Math.ceil(brickANS);

                    //for brickswastage computation
                    brickcal3();
                }
                

                function brickcal3(){
                    var temp = Math.round(brickANS)*(brickswastage/100);
                    var temp2 = Math.round(brickANS) + temp;
                    var brickANS2 = temp2;


                    console.log(brickANS);
                    console.log(brickANS2);
                    console.log(Math.ceil(brickANS2));
                    document.getElementById("totalbricksneeded").value = Math.ceil(brickANS2);

                }
            }
        }
    }
}
function brickcalRESET(){
    
document.getElementById("bricklength").value="";
document.getElementById("brickheight").value="";
document.getElementById("brickwidth").value="";
document.getElementById("mortarjoint").value="";
document.getElementById("walllength").value="";
document.getElementById("wallheight").value="";
document.getElementById("wallarea").value="";
document.getElementById("brickswastage").value="";
document.getElementById("bricksneeded").value="";
document.getElementById("totalbricksneeded").value="";
}

// CEMENT CALCULATOR

function paintcal(){

    //for type of concrete - select box
    var typeofcementJS = document.getElementById("typeofcement");
    typeofcementJS.addEventListener('change', function(){
        console.log(typeofcementJS.value);
        typeofcement = typeofcementJS.value;
        //brickcal2();
    })

    var cementwetvolumeJS = document.getElementById("cementwetvolume");
    cementwetvolumeJS.onkeyup = function(){
        console.log(cementwetvolumeJS.value);
        cementwetvolume = cementwetvolumeJS.value;
        //cementcal2();
    }

    var cementdryvolumeJS = document.getElementById("cementdryvolume");
    cementdryvolumeJS.onkeyup = function(){
        console.log(cementdryvolumeJS.value);
        cementdryvolume = cementdryvolumeJS.value;
        //cementcal2();
    }
    
    var cementwasteJS = document.getElementById("cementwaste");
    cementwasteJS.onkeyup = function(){
        console.log(cementwasteJS.value);
        cementwaste = cementwasteJS.value;
        //cementcal2();
    }

    var cementtotalvolumeJS = document.getElementById("cementtotalvolume");
    cementtotalvolumeJS.onkeyup = function(){
        console.log(cementtotalvolumeJS.value);
        cementtotalvolume = cementtotalvolumeJS.value;
        //cementcal2();
    }

    // select box
    var concretemixJS = document.getElementById("concretemix");
    concretemixJS.addEventListener('change', function(){
        console.log(concretemixJS.value);
        concretemix = concretemixJS.value;
        //brickcal2();
    })

    var volumeofcementJS = document.getElementById("volumeofcement");
    volumeofcementJS.onkeyup = function(){
        console.log(volumeofcementJS.value);
        volumeofcement = volumeofcementJS.value;
        //cementcal2();
    }

    var weightofcementJS = document.getElementById("weightofcement");
    weightofcementJS.onkeyup = function(){
        console.log(weightofcementJS.value);
        weightofcement = weightofcementJS.value;
        //cementcal2();
    }

    var bagsizeJS = document.getElementById("bagsize");
    bagsizeJS.onkeyup = function(){
        console.log(bagsizeJS.value);
        bagsize = bagsizeJS.value;
        //cementcal2();
    }
}

// Concrete Calculator

function concretecal(){

    //variable declaration

    var concretelength, concretewidth, concreteheight, concretequantity, concretebagsize, concretebagsneeded;

    var concretelenghtJS = document.getElementById("concretelength");
    concretelenghtJS.onkeyup = function(){
        console.log(concretelenghtJS.value);
        concretelength = concretelenghtJS.value;
        concretecal2();
    }

    var concretewidthJS = document.getElementById("concretewidth");
    concretewidthJS.onkeyup = function(){
        console.log(concretewidthJS.value);
        concretewidth = concretewidthJS.value;
        concretecal2();
    }

    var concreteheightJS = document.getElementById("concreteheight");
    concreteheightJS.onkeyup = function(){
        console.log(concreteheightJS.value);
        concreteheight = concreteheightJS.value;
        concretecal2();
    }

    var concretequantityJS = document.getElementById("concretequantity");
    concretequantityJS.onkeyup = function(){
        console.log(concretequantityJS.value);
        concretequantity = concretequantityJS.value;
        concretecal2();
    }

    //for bag size - select box
    var concretebagsizeJS = document.getElementById("concretebagsize");
    concretebagsizeJS.addEventListener('change', function(){
        console.log(concretebagsizeJS.value);
        concretebagsize = concretebagsizeJS.value;
        //brickcal2();
    })

    var concretebagsneededJS = document.getElementById("concretebagsneeded");
    concretebagsneededJS.onkeyup = function(){
        console.log(concretebagsneededJS.value);
        concretebagsneeded = concretebagsneededJS.value;
        concretecal2();
    }

    function concretecal2(){
        if (concretelength != undefined && concretewidth != undefined && concreteheight != undefined && concretequantity != undefined){
            /*
                NOTES:

                40 pound bag yields .011 cubic yards
                60 pound bag yields .017 cubic yards
                80 pound bag yields .022 cubic yards


                Cubic Yards = Length (in feet) Width (in feet) Depth (in feet) ÷ 27
                Simply multiply the three dimensions together to find the number of cubic feet, then divide by 27 to find the number of cubic yards.

                1 foot = 12 inches
            */
                var concretetemp = parseFloat(concreteheight)/12;
                concreteheight = concretetemp;
                console.log(concreteheight);
                concretecomputation1 = parseFloat(concretelength) * parseFloat(concretewidth) * parseFloat(concreteheight);
                cubicyard = concretecomputation1 / 27;
                console.log("cubic yard: " + cubicyard);


        }
    }
}