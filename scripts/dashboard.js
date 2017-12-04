window.onload=function(){
    let compose=document.getElementById('compose');
    let start=1;
    let p=[800,250,600,500,400,700,300,350,200];

    getMessages();
    outMessages();

    compose.addEventListener('click',function(){
        let random=Math.floor((Math.random()*8)+0);
        let position= p[random];
        createNewMessage(position,start);
        start++;
    });
}

function closeMessageBox(id){
    id.parentNode.removeChild(id);
}


function createNewMessage(leftpos,number){
    let newmessage=document.createElement('DIV');
    newmessage.setAttribute('id','mbox'+number);
    newmessage.classList.add('newmessage');
    let p=document.createElement('P');
    p.appendChild(document.createTextNode('New Message'));
    p.classList.add('messagehead');
    
    
    let cbutton= document.createElement('BUTTON');
    cbutton.appendChild(document.createTextNode('Close'));
    cbutton.setAttribute('value','Close');
    cbutton.setAttribute('onclick','closeMessageBox('+'mbox'+number+')');
    cbutton.classList.add('closebutton');
    

    newmessage.appendChild(cbutton);
    newmessage.appendChild(p);

    newmessage.style.left=leftpos+'px';
    let id='form'+number;

    let form = document.createElement('FORM');
    form.setAttribute('id',id);

    let input1 = document.createElement('INPUT');
    input1.setAttribute('type','text');
    input1.setAttribute('name','recipient');
    input1.setAttribute('placeholder','To');
    input1.setAttribute('id','to'+number);
    input1.classList.add('fields');

    let input2=document.createElement('INPUT');
    input2.setAttribute('type','text');
    input2.setAttribute('name','subject');
    input2.setAttribute('placeholder','Subject');
    input2.setAttribute('id','subject'+number);
    input2.classList.add('fields');

    let txtarea=document.createElement('TEXTAREA');
    txtarea.setAttribute('cols','30');
    txtarea.setAttribute('rows','15');
    txtarea.setAttribute('id','body'+number);
    txtarea.classList.add('textarea');

    let button= document.createElement('BUTTON');
    button.appendChild(document.createTextNode('Send'));
    button.setAttribute('value','Send');
    button.setAttribute('onclick','send_message('+number+')');
    button.classList.add('sendbutton');


    form.append(input1);
    form.append(input2);
    form.append(txtarea);
    newmessage.appendChild(form);
    newmessage.appendChild(button);
    document.body.appendChild(newmessage);
}

function send_message(number){
    let recipients=document.getElementById('to'+number).value;
    let subject=document.getElementById('subject'+number).value;
    let body = document.getElementById('body'+number).value;
    let params='recipients='+recipients+'&subject='+subject+'&body='+body;
    recipients.trim();
    if(recipients===''){
        alert('You must enter at least one recipient');
    }
    else{
        let xttp = new XMLHttpRequest();
        xttp.onreadystatechange = function(){
            if(xttp.readyState===XMLHttpRequest.DONE && xttp.status===200){
                let response=xttp.responseText;
                alert(response);
            }
        }
        xttp.open('POST','/messages/add_message.php',true);
        xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xttp.send(params);

        let div=document.getElementById('mbox'+number);
        div.parentNode.removeChild(div);
    }    
}

function viewMessage(id,type){
    let divout=document.getElementById('outmessages');
    let divless=document.getElementById('messages');
    divless.style.display='none';
    divout.style.display='none';
    let xttp = new XMLHttpRequest();
    let params='message_id='+id+'&type='+type;
    let divmess=document.getElementById('currmessage');
    divmess.style.display='block';
    xttp.onreadystatechange = function(){
        if(xttp.readyState===XMLHttpRequest.DONE && xttp.status===200){
            let response=xttp.responseText;
            divmess.innerHTML='';
            divmess.innerHTML=response;
        }
    }
    xttp.open('POST','/messages/view_message.php',true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xttp.send(params);
}


function getMessages(){
    let xttp = new XMLHttpRequest();
    let divmess=document.getElementById('messages');
    xttp.onreadystatechange = function(){
        if(xttp.readyState===XMLHttpRequest.DONE && xttp.status===200){
            let response=xttp.responseText;
            divmess.innerHTML=response;
            setTimeout(getMessages, 30000);
        }
    }
    xttp.open('GET','/messages/get_messages.php',true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xttp.send();    
}

function outMessages(){
    let xttp = new XMLHttpRequest();
    let divmess=document.getElementById('outmessages');
    xttp.onreadystatechange = function(){
        if(xttp.readyState===XMLHttpRequest.DONE && xttp.status===200){
            let response=xttp.responseText;
            divmess.innerHTML=response;
            setTimeout(outMessages, 30000);
        }
    }
    xttp.open('GET','/messages/out_messages.php',true);
    xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xttp.send();    
}


function showoutbox(){
  let divout=document.getElementById('outmessages');
  let divmess=document.getElementById('messages');
  let divcurr=document.getElementById('currmessage');
  divmess.style.display='none';
  divcurr.style.display='none';
  divout.style.display='block';
  
}

function showinbox(){
    let divout=document.getElementById('outmessages');
    let divmess=document.getElementById('messages');
    let divcurr=document.getElementById('currmessage');
    divmess.style.display='block';
     divcurr.style.display='none';
    divout.style.display='none';
}    

function readupdate(id,value,type){
    let params='messageid='+id;
    if(value.classList.contains('bold')){
        value.classList.remove('bold');
        let xttp = new XMLHttpRequest();
        xttp.onreadystatechange = function(){
            if(xttp.readyState===XMLHttpRequest.DONE && xttp.status===200){
            }
        }
        xttp.open('POST','/messages/readupdate.php',true);
        xttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xttp.send(params);
    }
    viewMessage(id,type);
}
