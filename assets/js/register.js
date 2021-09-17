document.getElementById('usertype').addEventListener('change', function () {
    if (this.value== "architect"){
        var style = this.value == "architect" ? 'block' : 'none';
        document.getElementById('usertype1').style.display = style;
        document.getElementById('usertype2').style.display = 'none';
    }
    if (this.value== "projectmanager"){
        var style = this.value == "projectmanager" ? 'block' : 'none';
        document.getElementById('usertype1').style.display = style;
        document.getElementById('usertype2').style.display = 'none';
    }
    if (this.value== "client"){
        var style = this.value == "client" ? 'block' : 'none';
        document.getElementById('usertype1').style.display = 'none';
        document.getElementById('usertype2').style.display = style;
    }
        
    
});