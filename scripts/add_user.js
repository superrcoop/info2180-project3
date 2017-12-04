window.onload=function(){
	document.getElementById('add_button').disabled=true;
}
function testblank(input,number){
	let m= document.getElementById('label'+number);
	input.trim();
	if(input.length<1 || input===" "){
		m.style.display="block";
		let main = document.getElementById('main');
		main.style.height='auto';
	}
	else{
		m.style.display="none";
		document.getElementById('add_button').disabled=false;
	}
}

function testpassword(password,number){
	let m=document.getElementById('label'+number);
	let patt="/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/";
	if(password.match(patt)===true){
		m.style.display="none";
		document.getElementById('add_button').disabled=false;
	}
	if(password.match(patt)===false){
		m.style.display="block";
		let main = document.getElementById('main');
		main.style.height='auto';
	}
}