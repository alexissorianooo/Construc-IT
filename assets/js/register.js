document.getElementById('usertype').addEventListener('change', function () {
    if (this.value== "employee"){
        var style = this.value == "employee" ? 'block' : 'none';
        document.getElementById('usertype1').style.display = style;
        document.getElementById('usertype2').style.display = 'none';
    }
    if (this.value== "client"){
        var style = this.value == "client" ? 'block' : 'none';
        document.getElementById('usertype1').style.display = 'none';
        document.getElementById('usertype2').style.display = style;
    }
        
    
});