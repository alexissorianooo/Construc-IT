<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of adding element to an array</title>
</head>

<body>
 <script type="text/javascript">
var data = new Array(); // creating array

function add_element(){
data.push(document.getElementById('t1').value); // adding element to array
document.getElementById('t1').value=''; // Making the text box blank
console.log(data);
disp(); // displaying the array elements
}
function remove_element(index_no){
var t1=data.splice(index_no,1);
console.log(t1);
console.log(data.indexOf(data[i]));
disp(); // displaying the array elements
}


function disp(){
    var str='';
    str = 'total number of elements in data array : ' + data.length + '<br>';
    for (i=0;i<data.length;i++) {     
     str += i + ':'+data[i] + " <a href=# onClick='remove_element("+data.indexOf(data[i])+")'> Remove</a> " + "<br >";  // adding each element with key number to variable
    } 
    document.getElementById('disp').innerHTML=str; // Display the elements of the array
}
</script>

<input type=text  id='t1'><input type=button value='Add' onClick='add_element()';>
<div id=disp></div>
</body>
</html>