// JavaScript Document


function tab(ev,obj) {
var keyCode = document.layers ? ev.which : document.all ? event.keyCode : document.getElementById ? ev.keyCode : 0;
if (keyCode !=13) return;
frm = obj.form;
for(i = 0; i < frm.elements.length; i++) 
if (frm.elements[i] == obj) { 
if (i == frm.elements.length-1) i =-1;
break 
}
frm.elements[i+1].focus();
return false;
}
function decimal(evt) {
var keyPressed = (evt.which) ? evt.which : event.keyCode
return !((keyPressed !=13) && (keyPressed != 46) && (keyPressed < 48 || keyPressed > 57));



}