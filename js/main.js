/* simple scene switcher */
var scenes = [];
var activeScene = -1;
var scene = null;

var transition = 750;  /* fade transition in millisecond */
var hideDuration  = 250;  /* time to stay hidden */
var showDuration = 6500; /* time to stay visible */
var scenePaused = false;

function setSceneOpacity(opacity) {
  scene.style.opacity = opacity;
  scene.style.MozOpacity = opacity;
  scene.style.KhtmlOpacity = opacity;
  scene.style.filter = 'alpha(opacity=' + (opacity * 100) + ');';
}

function fadeSceneOut() {
  if(scenePaused) {
     setTimeout("fadeSceneOut()", 400);
     return;
  }
  for (i = 0; i <= 1; i += 0.01) {
    setTimeout("setSceneOpacity(" + (1 - i) +")", i * transition);
  }
   setTimeout("fadeSceneIn()", (transition + hideDuration));
}

function fadeSceneIn() {
  if(++activeScene >= scenes.length) {
    activeScene =  0;
  }
  scene = scenes[activeScene];
  for (i = 0; i <= 1; i += 0.01) {
    setTimeout("setSceneOpacity(" + i +")", i * transition);
  }
   setTimeout("fadeSceneOut()", (transition + showDuration));
}

var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function startShow() {
  scenes.push(document.getElementById('scene0'));
  scenes.push(document.getElementById('scene1'));
  scenes.push(document.getElementById('scene2'));
  fadeSceneIn();
}


/*
function validateContactForm(form) {
  if(form.name.value.length == 0 || form.name.value == form.name.defaultValue) {
    alert('Please enter your name.');
    return false;
  } 
  if(form.company.value.length == 0 || form.company.value == form.company.defaultValue) {
    alert('Please enter your company name.');
    return false;
  } 
  
  if(form.email.value.length == 0 || form.email.value == form.email.defaultValue) {
    alert('Please enter your email address.');
    return false;
  } 
  if(!emailRE.test(form.email.value)) {
    alert('Please enter a valid email address.');
    return false;
  } 
  
  if(form.comments.value.length == 0 || form.comments.value == form.comments.defaultValue) {
    alert('Please enter your comments or questions.');
    return false;
  } 
  return ( true );
  
}

function addInputHandlers(element) {
  element.onfocus = function(){element.select();};
  element.onmouseup = function(){return false;};
  element.onblur = function() {if(element.value == '')
                   {element.value = element.defaultValue;}};
}

function initContactForm() {
  var form = document.forms['contactForm'];
  addInputHandlers(form.name);
  addInputHandlers(form.company);
  addInputHandlers(form.email);
  addInputHandlers(form.comments);
}

*/