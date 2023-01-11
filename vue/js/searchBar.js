function chercher() {
  let input = document.getElementById("searchbar").value;
  input = input.toLowerCase();
  let x = document.getElementsByClassName("recherche");

  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
      x[i].style.display = "none";
    } else {
      x[i].style.display = "block";
    }
  }
}

function checkBox() {
  let input = document.getElementById("searchCheck").value;
  let input2 = document.getElementById("searchCheck2").value;
  input = input.toLowerCase();
  input2 = input2.toLowerCase();
  let x = document.getElementsByClassName("searchCheckbox");
  let x2 = document.getElementsByClassName("searchCheckbox2");
  if (document.getElementById("searchCheck").checked == true) {
    for (i = 0; i < x.length; i++) {
      if (!x[i].innerHTML.toLowerCase().includes(input)) {
        x[i].style.display = "none";
      } else {
        x[i].style.display = "block";
      }
    }
  } else {
    if (document.getElementById("searchCheck2").checked == true) {
      for (i = 0; i < x2.length; i++) {
        if (!x2[i].innerHTML.toLowerCase().includes(input2)) {
          x2[i].style.display = "none";
        } else {
          x2[i].style.display = "block";
        }
      }
    } else {
      if (document.getElementById("searchCheck").checked == false) {
        for (i = 0; i < x.length; i++) {
          if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "block";
          } else {
            x[i].style.display = "block";
          }
        }
      }
    }
  }
}
