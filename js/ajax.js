

function AjaxvalidUSER(str,nb) {
        var str1 = "st";
        nb=nb-1;
        var res = str1.concat(nb);//the panding button id
        document.getElementById(res).innerHTML="approved";
        document.getElementById(res).className = "label label-success";
        var xhttp; 
        // send a request for the valideuser.php and get an answer to test.
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          document.getElementById("answertest").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "http://localhost/webproject/database/CRUD/validusr.php?id="+str, true);
        xhttp.send();
   
  }


function AjaxrmUSER(str,nb) {
   
  var str1 = "btid";
    nb=nb-1;
    var res = str1.concat(nb);//the tr id
    document.getElementById(res).innerHTML="";//the tr removing
  
     // send a request for the delete.php and get an answer to test.
     xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
       document.getElementById("answertest").innerHTML = this.responseText;
       }
     };
     xhttp.open("GET", "http://localhost/webproject/database/CRUD/delete.php?id="+str, true);
     xhttp.send();

}
