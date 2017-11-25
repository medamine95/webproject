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
       }
     };
     xhttp.open("GET", "http://localhost/webproject/database/CRUD/delete.php?id="+str, true);
     xhttp.send();



     //window.open('http://localhost/webproject/database/CRUD/delete.php?id='+str);
     //alert("dff");
}
