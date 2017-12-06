 window.onload=function(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(xhttp.readyState===XMLHttpRequest.DONE && xhttp.status===200){
            let response= xhttp.response;
            document.open();
            document.write(response);
            document.close();
        }
    }
    xhttp.open('GET','/login.php',true);
    xhttp.send();
}