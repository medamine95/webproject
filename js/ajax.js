<<<<<<< HEAD
function AjaxvalidUSER(str) {
        alert(str);

    /*
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "gethint.php?q="+str, true);
    xhttp.send();   */
  }
/*
  $("body").on("click",".remove-item",function(){
      alert('o');
    /*var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + 'api/delete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });

});*/


function AjaxrmUSER(str,nb) {
    var str1 = "btid";
    nb=nb-1;
    var res = str1.concat(nb);
    document.getElementById(res).innerHTML="";
  


     var xhttp; 
     if (str == "") {
       document.getElementById("txtHint").innerHTML = "";
       return;
     }
     xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
       document.getElementById("txtHint").innerHTML = this.responseText;
=======


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
>>>>>>> 3f418ea6f34719dbceec2ee367df498842445d84
       }
     };
     xhttp.open("GET", "http://localhost/webproject/database/CRUD/delete.php?id="+str, true);
     xhttp.send();

<<<<<<< HEAD


     //window.open('http://localhost/webproject/database/CRUD/delete.php?id='+str);
     //alert("dff");
=======
>>>>>>> 3f418ea6f34719dbceec2ee367df498842445d84
}
