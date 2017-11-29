//-----------------------------------USER-----------------------------------------
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

//-----------------------------------ARTICLE-----------------------------------------
var vrid=0;
var vrpos=0;  
  function Ajaxarticle() {

      if(($('#tit').val())&&($('#des').val())&&($('#cat').val())){
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
       
          var array = JSON.parse("[" + this.responseText+ "]");
          
              temp= '<button type=\"button\" class=\"btn  btn-info \" data-toggle=\"modal\" data-target=\"#edit-item\" ><i class=\"fa fa-check fa-1x\" aria-hidden=\"true\" onclick=\"ini(<?php echo $article[\'id\'] ?>,<?php ++$atid; echo $atid; ?>)\" > </i> EDIT </button>   <button type=\"button\" class=\"btn  btn-danger\" ><i class=\"fa fa-trash-o fa-1x \" aria-hidden=\"true\"></i>DELETE </button>  ';
               document.getElementById("btid").insertAdjacentHTML('afterbegin', "<tr>  <td>"+array[0][0]+"</td> <td>"+array[0][1]+"</td> <td>"+array[0][2]+"</td> <td>"+array[0][3]+"</td><td>"+array[0][4]+"</td> <td>"+array[0][5]+"</td><td>"+temp+"</td></tr>");
         document.getElementById("tit").innerHTML="";
         document.getElementById("des").innerHTML="";
         toastr.success(array[0][1], 'Ajouter avec succès', {timeOut: 5000});
         
        }
      };
      xhttp.open("GET", "http://localhost/webproject/database/CRUD/ARTICLE/addarticle.php?title="+$('#tit').val()+"&description="+$('#des').val()+"&categorie="+$('#cat').val(), true);
      xhttp.send();
      $(".modal").modal('hide');
     // alert("rrrrrrrrrrrrrrrrr");
    }else {toastr.error("", 'un element est vide', {timeOut: 5000});}
   
 }
 

 function Ajaxaddarticle() {
     if(($('#itt').val())&&($('#sed').val())&&($('#tac').val())){
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
       
          var array = JSON.parse("[" + this.responseText+ "]");
          
              temp= '<button type=\"button\" class=\"btn  btn-info \" data-toggle=\"modal\" data-target=\"#edit-item\" ><i class=\"fa fa-check fa-1x\" aria-hidden=\"true\" onclick=\"ini(<?php echo $article[\'id\'] ?>,<?php ++$atid; echo $atid; ?>)\" > </i> EDIT </button>   <button type=\"button\" class=\"btn  btn-danger\" ><i class=\"fa fa-trash-o fa-1x \" aria-hidden=\"true\"></i>DELETE </button>  ';
             // document.getElementById(btid).insertAdjacentHTML('afterbegin', "<tr>  <td>"+array[0][0]+"</td> <td>"+array[0][1]+"</td> <td>"+array[0][2]+"</td> <td>"+array[0][3]+"</td><td>"+array[0][4]+"</td> <td>"+array[0][5]+"</td><td>"+temp+"</td></tr>");
             document.getElementById("atid"+vrpos).innerHTML="<tr>  <td>"+array[0][0]+"</td> <td>"+array[0][1]+"</td> <td>"+array[0][2]+"</td> <td>"+array[0][3]+"</td><td>"+array[0][4]+"</td> <td>"+array[0][5]+"</td><td>"+temp+"</td></tr>";
           
          // document.getElementById("atid"+vrpos).innerHTML("r");
        //  document.getElementById("btid").innerHTML="";
             toastr.success(array[0][1], 'modifier avec succès', {timeOut: 5000});
         
        }
      };
      xhttp.open("GET", "http://localhost/webproject/database/CRUD/ARTICLE/modify.php?title="+$('#itt').val()+"&description="+$('#sed').val()+"&categorie="+$('#tac').val()+"&id="+vrid, true);
      xhttp.send();
      $(".modal").modal('hide');
    }else {toastr.error("", 'un element est vide', {timeOut: 5000});}
   
   }

   
   
 function Ajaxrmarticle() {
  // send a request for the delete.php and get an answer to test.
   xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     
     if (this.readyState == 4 && this.status == 200) {
       var array = JSON.parse("[" + this.responseText+ "]");
       
          //document.getElementById("atid"+vrpos).innerHTML="";
          document.getElementById("atid"+vrpos).innerHTML="";
          
          toastr.error(array[0][1], 'supprimer avec succès', {timeOut: 5000});
      
     }
   };
   xhttp.open("GET", "http://localhost/webproject/database/CRUD/ARTICLE/removeart.php?id="+vrid, true);
   xhttp.send();

}





   function ini(a,b){ vrid=a;
    vrpos=  b-1; }