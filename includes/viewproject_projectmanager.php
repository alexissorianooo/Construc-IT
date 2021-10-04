<?php
session_start();

if(isset($_POST["saveBUTTON"])){

    require_once 'db.php';
    require_once 'functions.php';

    echo "<br>". $project_id = $_POST['project_id'];
    echo "<br>". $select1 = $_POST['SELECTPM1'];
    echo "<br>". $select2 = $_POST['SELECTPM2'];
    echo "<br>". $select3 = $_POST['SELECTPM3'];
    echo "<br>". $select4 = $_POST['SELECTPM4'];
    echo "<br>". $select5 = $_POST['SELECTPM5'];
    echo "<br>". $select6 = $_POST['SELECTPM6'];
    echo "<br>". $select7 = $_POST['SELECTPM7'];
    echo "<br>". $select8 = $_POST['SELECTPM8'];
    echo "<br>". $select9 = $_POST['SELECTPM9'];
    echo "<br>". $select10 = $_POST['SELECTPM10'];
    echo "<br>". $select11 = $_POST['SELECTPM11'];
    echo "<br>". $select12 = $_POST['SELECTPM12'];
    echo "<br>". $select13 = $_POST['SELECTPM13'];
    echo "<br>". $select14 = $_POST['SELECTPM14'];
    echo "<br>". $select15 = $_POST['SELECTPM15'];
    echo "<br>". $select16 = $_POST['SELECTPM16'];
    echo "<br>". $select17 = $_POST['SELECTPM17'];
    echo "<br>". $select18 = $_POST['SELECTPM18'];
    echo "<br>". $select19 = $_POST['SELECTPM19'];
    echo "<br>". $select20 = $_POST['SELECTPM20'];
    echo "<br>". $select21 = $_POST['SELECTPM21'];

    echo "<br> user id: ".$project_pmSELECTid = $_SESSION["userid"];


    //variables for progress bar
    echo "<br> counter: ".$counter=0;
    
    $numerator=0;

    //for additional activities
    //for input and select
    
    if($_POST['inputPM22']!=null && $_POST['inputPM22']!="empty"){ //check if there is a value for input
        echo "<br> input22: ".$input22=$_POST['inputPM22']; //if there is value, put the value to input variable
        $counter++; //for denominator, progress bar
        $select22 = $_POST['SELECTPM22']; //gets the value from select 
        if($select22=="Completed"){ //checks select if completed for progress bar
            $numerator++; //for progress bar
        }
    }else{
        $input22="empty"; //if there is no value for input, put "empty" value
        $select22 = "Pending";
    }
    if($_POST['inputPM23']!=null && $_POST['inputPM23']!="empty"){
        echo "<br> input23: ".$input23=$_POST['inputPM23'];
        $counter++;
        $select23 = $_POST['SELECTPM23'];
        if($select23=="Completed"){
            $numerator++;
        }
    }else{
        $input23="empty";
        $select23 = "Pending";
    }
    if($_POST['inputPM24']!=null && $_POST['inputPM24']!="empty"){
        echo "<br> input24: ".$input24=$_POST['inputPM24'];
        $counter++;
        $select24 = $_POST['SELECTPM24'];
        if($select24=="Completed"){
            $numerator++;
        }
    }else{
        $input24="empty";
        $select24 = "Pending";
    }

    if($_POST['inputPM25']!=null && $_POST['inputPM25']!="empty"){
        echo "<br> input25: ".$input25=$_POST['inputPM25'];
        $counter++;
        $select25 = $_POST['SELECTPM25'];
        if($select25=="Completed"){
            $numerator++;
        }
    }else{
        $input25="empty";
        $select25 = "Pending";
    }
    if($_POST['inputPM26']!=null && $_POST['inputPM26']!="empty"){
        echo "<br> input26: ".$input26=$_POST['inputPM26'];
        $counter++;
        $select26 = $_POST['SELECTPM26'];
        if($select26=="Completed"){
            $numerator++;
        }
    }else{
        $input26="empty";
        $select26 = "Pending";
    }

    echo "<br> counter after if else: ".$counter;

    // for progress bar
    $denominator = $counter+21;
        
    if($select1=="Completed"){
        $numerator++;
    }
    if($select2=="Completed"){
        $numerator++;
    }
    if($select3=="Completed"){
        $numerator++;
    }
    if($select4=="Completed"){
        $numerator++;
    }
    if($select5=="Completed"){
        $numerator++;
    }
    if($select6=="Completed"){
        $numerator++;
    }
    if($select7=="Completed"){
        $numerator++;
    }
    if($select8=="Completed"){
        $numerator++;
    }
    if($select9=="Completed"){
        $numerator++;
    }
    if($select10=="Completed"){
        $numerator++;
    }
    if($select11=="Completed"){
        $numerator++;
    }
    if($select12=="Completed"){
        $numerator++;
    }
    if($select13=="Completed"){
        $numerator++;
    }
    if($select14=="Completed"){
        $numerator++;
    }
    if($select15=="Completed"){
        $numerator++;
    }
    if($select16=="Completed"){
        $numerator++;
    }
    if($select17=="Completed"){
        $numerator++;
    }
    if($select18=="Completed"){
        $numerator++;
    }
    if($select19=="Completed"){
        $numerator++;
    }
    if($select20=="Completed"){
        $numerator++;
    }
    if($select21=="Completed"){
        $numerator++;
    }

    echo "<br> numerator: ".$numerator;
    echo "<br> denominator: ".$denominator;
    echo "<br> answer: ".$ans = $numerator/$denominator;

    if($numerator/$denominator==1){
        updateProjectPM($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13, $select14, $select15, $select16, $select17, $select18, $select19, $select20, $select21, $select22, $select23, $select24, $select25, $select26, $input22, $input23, $input24, $input25, $input26);
        pmStatusComplete($conn, $project_pmSELECTid);
        projectCompletePM($conn, $project_id);
    } 

    updateProjectPM($conn, $numerator, $denominator, $project_id, $select1, $select2, $select3, $select4, $select5, $select6, $select7, $select8, $select9, $select10, $select11, $select12, $select13, $select14, $select15, $select16, $select17, $select18, $select19, $select20, $select21, $select22, $select23, $select24, $select25, $select26, $input22, $input23, $input24, $input25, $input26);
    pmStatusINC($conn, $project_pmSELECTid);
    projectNOTCompletePM($conn, $project_id);
    
}else{
    echo "what's wrong brother?";
}