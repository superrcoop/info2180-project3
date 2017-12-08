function adduser(firstname,lastname,username,password){
	let params='firstname='+firstname+'&lastname='+lastname+'&username='+username+'&password='+password;
    let xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(xttp.readyState===XMLHttpRequest.DONE && xttp.status===200){
            let response=xttp.response;
            document.open()
            document.write(response);
            document.close();
        }
    }
    xttp.open('POST','/users_pages/insert_user.php',true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xttp.send(params);
}

function testform(){
        let fname = document.getElementById('fname').value.trim();
    	let lname = document.getElementById('lname').value.trim();
    	let uname = document.getElementById('uname').value.trim();
    	let passw = document.getElementById('passw').value;
    	let message="The following errors were found:\n";
    	message=errors('Firstname',message,fname);
    	message=errors('Lastname',message,lname);
    	message=errors('Usertname',message,uname);
    	message=messagepass(message,passw);
	    
    	if(empty(fname)===false && empty(lname)===false && empty(uname)===false && testpassword(passw)===true){
    	    adduser(fname,lname,uname,passw);
    	}
    	else{
    	    alert(message);
    	}
}

function errors(name,status,variable){
    if(empty(variable)===true){
        status+="The "+name+" field cannot be empty\n";
    }
    return status;
}

function empty(name){
    if(name==''){
        return true;
    }
    else{
        return false;
    }
}



function testpassword(pass){
    let patt = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/;
    console.log(patt,pass);
    if(patt.test(pass)===false){
        return false
	}
	else{
	    return true;
	}    
}

function messagepass(status,pass){
    let patt = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/;
    console.log(patt,pass);
    if(patt.test(pass)===false){
        status+="The password must contain at Least one Uppercase letter one lowercase letter and a digit";
        return status;
    }
}

function logout(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(xhttp.readyState===XMLHttpRequest.DONE && xhttp.status===200){
            let response= xhttp.response;
            document.open();
            document.write(response);
            document.close();
        }
    }
    xhttp.open('POST','/logout.php',true);
    xhttp.send();
}

function backtomessages(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(xhttp.readyState===XMLHttpRequest.DONE && xhttp.status===200){
            let response= xhttp.response;
            document.open();
            document.write(response);
            document.close();
        }
    }
    xhttp.open('GET','/dashboard.php',true);
    xhttp.send();
}