 window.onload=function(){
    let xhttp = new XMLHttpRequest();

}

function showDashboard(){
    xhttp.onreadystatechange=function(){
        if(this.readyState=== 4 && this.status===200){
            document.getElementById("home").innerHTML = this.responseText;
        }
    };
    xhttp.open('GET','dashboard.html',true);
    xhttp.send();
}

function showMain(){
    xhttp.onreadystatechange=function(){
        if(this.readyState=== 4 && this.status===200){
            document.getElementById("home").innerHTML = this.responseText;
        }
    };
    xhttp.open('GET','index.html',true);
    xhttp.send();
}

