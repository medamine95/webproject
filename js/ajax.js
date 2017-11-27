

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

/* Ajout un nouvel article */
$( document ).ready(function() {

  /* Create new Item */
  $(".crud-submit").click(function(e){
      e.preventDefault();
      var form_action = $("#create-item").find("form").attr("action");
      var title = $("#create-item").find("input[name='title']").val();
      var description = $("#create-item").find("textarea[name='description']").val();
      var categorie = $("#create-item").find("input[name='categorie']").val();
      if(title != '' && description != '' && categorie !=''){
          $.ajax({
              dataType: 'json',
              type:'POST',
              url: url + form_action,
              data:{title:title, description:description,categorie:categorie}
          }).done(function(data){
              $("#create-item").find("input[name='title']").val('');
              $("#create-item").find("textarea[name='description']").val('');
              $("#create-item").find("input[name='categorie']").val();
              getPageData();
           //   $(".modal").modal('hide');
              toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
          });
      }else{
          alert('You are missing title or description.')
      }
  
  });
  
  
  });
