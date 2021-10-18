function showDiv(divId, element)
{
    if(element.value == "Pending"){
        // document.getElementById(divId).style.display = element.value == 'Pending' ? 'block' : 'none';
        document.getElementById(divId).style.display = 'none';
    }
    if(element.value == "Delayed"){
        document.getElementById(divId).style.display = 'none';
    }
    
    console.log("hello");
}