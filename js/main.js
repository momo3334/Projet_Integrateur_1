checkCookie();
document.getElementById("styleTheme").addEventListener("click", setStyle);


var acc = document.getElementsByClassName("div_project_accordeon");
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

var acc_task = document.getElementsByClassName("div_list_accordeon");
var i;

for (i = 0; i < acc_task.length; i++) {
  acc_task[i].addEventListener("click", function () {
    var panel = this.nextElementSibling;
    var parentHeightToRemove = panel.scrollHeight;
    this.classList.toggle("active");
    
    if (panel.style.maxHeight) {

      //Resetting parent panel height
      var parentProjectPanel = findAncestor(this, "div_project");
      var parentPanelHeight = parentProjectPanel.scrollHeight;
      parentProjectPanel.style.maxHeight = parentPanelHeight - parentHeightToRemove + "px";

      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";

      //Setting parent panel height
      var parentProjectPanel = findAncestor(this, "div_project");
      var parentPanelHeight = panel.scrollHeight + parentProjectPanel.scrollHeight;
      parentProjectPanel.style.height = parentPanelHeight + "px";
      parentProjectPanel.style.maxHeight = parentPanelHeight + "px";
    }
  });
}

function findAncestor(el, cls) {
  while ((el = el.parentElement) && !el.classList.contains(cls));
  return el;
}


window.onload = function() {
  var filterCrit = document.getElementById("filterCrit");
  var filterSel = document.getElementById("filterOrder");

  if (filterCrit != null){
    filterCrit.onchange = function () {
      //empty Chapters- and Topics- dropdowns
      filterSel.length = 1;
      //display correct values
      if (this.value == 2) {
        filterSel.options[0] = new Option("Tous", "A");
        filterSel.options[1] = new Option("Vous", "D");
      } else {
        filterSel.options[0] = new Option("Croissant", "A");
        filterSel.options[1] = new Option("Décroissant", "D");
      }
    };
  }
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