//active link
$(document).ready(function() {
    $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("current-link");
        }
    });
});
//responsive menu mobile
function myFunction() {
    var x = document.getElementById("listamenu");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// Get the number of pixels scrolled
        document.addEventListener('DOMContentLoaded', function () {
			$('.right').on('click', function(){
			 var curr = $(this).parent().find('.currentItem');
			 var nxt = $(curr).next();
			 if($(nxt).length > 0) {
			    $(curr).toggleClass('currentItem');
				$(nxt).toggleClass('currentItem');
			 }
			});
			$('.left').on('click', function(){
			 var curr = $(this).parent().find('.currentItem');
			 var prev = $(curr).prev();
			 if($(prev).length > 0) {
			    $(curr).toggleClass('currentItem');
				$(prev).toggleClass('currentItem');
			 }
			});
        }, false);




//javascrip for login


function searchControl(){
var textbox = document.getElementById("search");
if(textbox ==""){
    alert("Enter the title or category of a film for the search")
    return false;
}
   if(textbox.value.length < 4){
       alert("Enter a minimum 4 characters for search")
       return false;
   }
}
function validazioneForm()
{

  var x = document.forms["login"]["username"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }

}
/*********Login************/

function checkfield(string,message)
{
  var patt=new RegExp('^[a-z0-9A-Z]{3,}$');

  if(patt.test(string))
  {
      message.innerHTML="";
  	return true;
  }
  else
  {
    message.innerHTML=" is empty or minimum 3 characters";
    return false;
  }

}

function LoginValidation()
{
  var  message_E= document.getElementById("error_U");
  var  message_P= document.getElementById("error_P");

  var name= document.forms["login"]["username"].value;
  var pass= document.forms["login"]["pass"].value;

  return checkfield(name,message_E) && checkfield(pass,message_P);
}

function val(){
  var bol=true;
  var  message_1= document.getElementById("error_name");
  var  message_2= document.getElementById("error_lname");
  var  message_3= document.getElementById("error_uname");
  var  message_4= document.getElementById("error_email");
  var  message_5= document.getElementById("error_pass");

  var name= document.forms["edit"]["name"].value;
  var lastame= document.forms["edit"]["surname"].value;
  var username= document.forms["edit"]["username"].value;
  var email= document.forms["edit"]["email"].value;
  var password= document.forms["edit"]["pass"].value;



  if(name!="")
{
  if(notcar(name,message_1)==false || checkfield(name,message_1)==false )
  {
    bol=false;
  }
    }

    if(lastame!="")
  {
    if(notcar(lastame,message_2)==false || checkfield(lastame,message_2)==false)
    {
      bol=false;
    }
      }

      if(username!="")
    {
      if(checkfield(username,message_3)==false)
      {
        bol=false;
      }
        }
        if(email!="")
      {
        if(verifyemail(email,message_4)==false)
        {
          bol=false;
        }
          }
          if(password!="")
        {
          if(passlen(password,message_5)==false)
          {
            bol=false;
          }
            }

  return bol;

}












function regval(){
  var bol=true;
  var  message_ES= document.getElementById("error_name");
  var  message_P= document.getElementById("error_lname");
  var  message_R= document.getElementById("error_uname");
  var  message_S= document.getElementById("error_email");
  var  message_T= document.getElementById("error_pass");
  var  message_TS= document.getElementById("error_confpass");
  var message_q= document.getElementById("error_check");
  var agree= document.getElementById("Agree").checked;
  var agree2= document.getElementById("Agree2").checked;
  var name= document.forms["registration"]["name"].value;
  var lastame= document.forms["registration"]["surname"].value;
  var username= document.forms["registration"]["username"].value;
  var email= document.forms["registration"]["email"].value;
  var password= document.forms["registration"]["pass"].value;
  var confpassword= document.forms["registration"]["confpass"].value;



  if(checkEmpty(name,message_ES)==false || notcar(name,message_ES)==false || checkfield(name,message_ES)==false)
  {
    bol=false;
  }

  if(checkEmpty(lastame,message_P)==false || notcar(lastame,message_P)==false || checkfield(lastame,message_P)==false)
  {
    bol=false;
  }

  if(checkEmpty(username,message_R)==false || checkfield(username,message_R)==false)
  {
    bol=false;
  }
  if(verifyemail(email,message_S)==false)
  {
    bol=false;
  }
  if(checkEmpty(password,message_T)==false ||passlen(password,message_T)==false|| matchpass(password,confpassword,message_T)==false)
  {
    bol=false;
  }
  if(checkEmpty(confpassword,message_TS)==false ||passlen(confpassword,message_TS)==false|| matchpass(confpassword,password,message_TS)==false)
  {
    bol=false;
  }

if(check(agree,agree2,message_q)==false) {

  bol=false;
}
    return bol;

}

/**********************check checkboxes********************************/

function check(string1,string2,message){
if(string1=="" || string2==""){

   message.innerHTML="to continue you must accept the following checkboxes";
  return false;
}
else {    message.innerHTML="";
  return true;
}
}




/***************minimum length password******************/
function passlen(string,message){
  var passlen= string.length;
  if (passlen == 0 ||passlen <= 7){

    message.innerHTML="length of the password must be > 7";
      return false;

  }
  else{

    message.innerHTML="";
  return true;
  }

}

/***************check password******************/

function matchpass(string1,string2,message){
if(string1!=string2){
  message.innerHTML="Password Does Not Match";
return false;

}
else{

  message.innerHTML="";
return true;
}

}






/***************check email******************/
function verifyemail(string,message){
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; /**email format**/
if (!string.match(mailformat)){
  message.innerHTML="Please enter a valid e-mail address";
    return false;
}
else
{
  message.innerHTML="";
return true;
}





}
/***************not alphabet characters******************/
function notcar(string,message){
var letters = /^[A-Za-z]+$/;
if(!string.match(letters)){
  message.innerHTML="Must have alphabet characters only ";
  return false;
  }
  else
  {
    message.innerHTML="";
  return true;
  }
}



/***********admin***************/
function checkEmpty(string,message)
{


  if(string=="")
  {

    message.innerHTML=" is empty ";
    return false;
  }
  else
  {
    message.innerHTML="";
  return true;
  }

}
function InsertMovieValidation()
{
  var bol=true;
  var title= document.forms["InsertM"]["title"].value;
  var poster= document.forms["InsertM"]["poster"].value;
  var year= document.forms["InsertM"]["year"].value;
  var ftime= document.forms["InsertM"]["ftime"].value;
  var lang= document.forms["InsertM"]["lang"].value;
  var rating= document.forms["InsertM"]["rating"].value;
  var tag= document.forms["InsertM"]["tag"].value;
  var source= document.forms["InsertM"]["source"].value;
  var plot= document.forms["InsertM"]["plot"].value;


    var  error_title= document.getElementById("error_title");
    if(checkEmpty(title,error_title)==false)
    {
      bol=false;
    }

    var  error_poster= document.getElementById("error_poster");
    if(checkEmpty(poster,error_poster)==false)
    {
      bol=false;
    }


    var  error_year= document.getElementById("error_year");
    if(checkEmpty(year,error_year)==false)
    {
      bol=false;
    }

    var  error_time= document.getElementById("error_time");
    if(checkEmpty(ftime,error_time)==false)
    {
      bol=false;
    }

    var  error_lang= document.getElementById("error_lang");
    if(checkEmpty(lang,error_lang)==false)
    {
      bol=false;
    }

    var  error_rating= document.getElementById("error_rating");
    if(checkEmpty(rating,error_rating)==false)
    {
      bol=false;
    }

    var  error_tag= document.getElementById("error_tag");
    if(checkEmpty(tag,error_tag)==false)
    {
      bol=false;
    }

    var  error_source= document.getElementById("error_source");
    if(checkEmpty(source,error_source)==false)
    {
      bol=false;
    }

    var  error_plot= document.getElementById("error_plot");
    if(checkEmpty(plot,error_plot)==false)
    {
      bol=false;
    }

    return bol;

}
/*********Search************/
function checkSearch(string,message)
{
  var patt=new RegExp('^[a-z0-9A-Z]{2,}$');

  if(patt.test(string))
  {
    message.innerHTML="";

  	return true;
  }
  else
  {
    message.innerHTML=" the search is empty or minimum 2 characters";
    return false;
  }

}
function SearchValidation()
{

  var  error_search= document.getElementById("error_search");
  var name= document.forms["ricerca"]["search"].value;

  return checkSearch(name,error_search);
}
