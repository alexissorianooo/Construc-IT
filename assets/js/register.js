document.getElementById('usertype').addEventListener('change', function () {
    if (this.value== "architect"){
        var style = this.value == "architect" ? 'block' : 'none';

        document.getElementById('usertype1').style.display = style;
        // document.getElementById('usertype2').style.display = 'none';
    
        console.log(this.value);

    }
    if (this.value== "projectmanager"){
        var style = this.value == "projectmanager" ? 'block' : 'none';

        document.getElementById('usertype1').style.display = style;
        // document.getElementById('usertype2').style.display = 'none';
    
        console.log(this.value);

    }
    if (this.value== "admin"){
        var style = this.value == "admin" ? 'block' : 'none';

        document.getElementById('usertype1').style.display = style;
        // document.getElementById('usertype2').style.display = 'none';
    
        console.log(this.value);

    }
    if (this.value== "client"){
        var style = this.value == "client" ? 'block' : 'none';
        document.getElementById('usertype1').style.display = 'none';
        document.getElementById('usertype2').style.display = style;

        console.log(this.value);
    }
        
    
});