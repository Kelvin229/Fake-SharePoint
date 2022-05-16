  /*Name: Kelvin Odinamadu
    COSC 2P89
    Assign_5
 */ 



            function ChangeColor() {
                    document.body.style.setProperty("--accent-1-color", "#151711");
                    document.body.style.setProperty("--top-bar-color", "#959693");
                    document.body.style.setProperty("--top-bar-border-color", "#7ab8ff");
                    document.body.style.setProperty("--title-color", "#b6b8b2");
                    document.body.style.setProperty("--menu-color", "#d3d6ce");
                    document.body.style.setProperty("--accent-2-color", "#151711");
                    document.body.style.setProperty("--side-content-color", "#ffffff");
                    document.body.style.setProperty("--footer-border-color", "#1e96ff");
                    document.body.style.setProperty("--footer-color", "#8a917e");
              
            }

            function ChangeColors() {
                    document.body.style.setProperty("--accent-1-color", "#5c5656");
                    document.body.style.setProperty("--top-bar-color", "#030202");
                    document.body.style.setProperty("--top-bar-border-color", "#7ab8ff");
                    document.body.style.setProperty("--title-color", "#171212");
                    document.body.style.setProperty("--menu-color", "#1a1717");
                    document.body.style.setProperty("--accent-2-color", "#5c5656");
                    document.body.style.setProperty("--side-content-color", "#290606");
                    document.body.style.setProperty("--footer-border-color", "#1e96ff");
                    document.body.style.setProperty("--footer-color", "#000000");
               
            }
            function ChangeColorsT() {
                    document.body.style.setProperty("--accent-1-color", "#edfc44");
                    document.body.style.setProperty("--top-bar-color", "#001e33");
                    document.body.style.setProperty("--top-bar-border-color", "#7ab8ff");
                    document.body.style.setProperty("--title-color", "#003c66");
                    document.body.style.setProperty("--menu-color", "#005999");
                    document.body.style.setProperty("--accent-2-color", "#ff6600");
                    document.body.style.setProperty("--side-content-color", "#d7ddd1");
                    document.body.style.setProperty("--footer-border-color", "#1e96ff");
                    document.body.style.setProperty("--footer-color", "#001e33");
              
            }

function openPage(titleName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(titleName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();