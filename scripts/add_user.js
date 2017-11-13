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
		console.log(m);
	}
	else{
		m.style.display="none";
		document.getElementById('add_button').disabled=false;
	}
}

function testpassword(password,number){
	let m=document.getElementById('label'+number);
	let patt="/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9]{8,}$/";
	if(password.match(patt)!==true){
		m.style.display="block";
		let main = document.getElementById('main');
		main.style.height='auto';
	}
	else{
		m.style.display="none";
		document.getElementById('add_button').disabled=false;
	}
}