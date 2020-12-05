checkCookie();
document.getElementById("styleTheme").addEventListener("click", setStyle);


var acc = document.getElementsByClassName("div_project_container");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");

    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

function setStyle(){
    let styleType = document.getElementById("styleTheme");
    let styleBody = document.getElementsByTagName("body")[0];

    if(styleType.value == "Standart"){
    document.cookie="theme=styleStandart";
    styleType.value = "Sombre";
    }
    else {
    document.cookie="theme=styleSombre";
    styleType.value = "Standart";
    }

    styleBody.classList.toggle('themeSombre');
}

function checkCookie() {
    let styleBody = document.getElementsByTagName("body")[0];
    let styleType = document.getElementById("styleTheme");
    var theme = getCookie("theme");
    if (theme == "styleSombre") {
        styleBody.classList.add('themeSombre');
        styleType.value = "Standart";

    } 
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }