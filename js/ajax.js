

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
          toastr.success(this.responseText, 'Success Alert', {timeOut: 5000});
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
        toastr.error(this.responseText, 'Remove Alert', {timeOut: 5000});
       }
     };
     xhttp.open("GET", "http://localhost/webproject/database/CRUD/delete.php?id="+str, true);
     xhttp.send();

}

  
  function Ajaxarticle(str) {
  
 
   
      // send a request for the delete.php and get an answer to test.
      if(($('#tit').val())&&($('#des').val())&&($('#cat').val())){
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         toastr.success(this.responseText, 'Saisir Alert', {timeOut: 5000});
        }
      };
      xhttp.open("GET", "http://localhost/webproject/database/CRUD/ARTICLE/addarticle.php?title="+$('#tit').val()+"&description="+$('#des').val()+"&categorie="+$('#cat').val(), true);
      xhttp.send();
      //alert(str);
      $(".modal").modal('hide');
     // alert("rrrrrrrrrrrrrrrrr");
    }else {toastr.error(this.responseText, 'un element est vide', {timeOut: 5000});}
 }
 