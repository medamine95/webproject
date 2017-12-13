<?php
 $db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');    

if(!empty($_POST["keyword"])) {
    $key=$_POST["keyword"];
    $query = $db->query("SELECT nom,description,categorie FROM article where nom like '%{$key}%'");
    
   
    $t = $query->fetchALL(PDO::FETCH_ASSOC);
    
    $total = $query->rowCOUNT();
if(!empty($total)) {
?>
<ul id="country-list">
<?php
foreach($t as $val) {
   
?>
<li onClick="selectname('<?php echo $val["nom"]; ?>');"><?php echo $val["nom"]; ?></li>

<?php } ?>
</ul>
<?php } } ?>