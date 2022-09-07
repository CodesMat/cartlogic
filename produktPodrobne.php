<?php
include_once 'header.php';
include_once 'footer.php';

$_SESSION['produkt'] = array();
$_SESSION['pocetProduktu']= 0;
if (isset($_GET['idp'])) {
$idp=$_GET['idp'];

$sql = "SELECT * FROM produkty JOIN kategorie ON produkty.id_kat =kategorie.id_kat WHERE id_pro = $idp;";
$result = $conn->query($sql);
			if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
?><div class="col-md-12"><a href="index.php?idk=<?php echo $row['id_kat']; ?>"> →<?php echo $row['nazev'];?>
</a></div><?php
		  }
		}
$sql = "SELECT * FROM produkty WHERE id_pro = '$idp';";
$result = $conn->query($sql);
			if ($result->num_rows > 0) {
		  while($row = $result->fetch_assoc()) {
		?>				  
<div style="margin-left: 10%;border: 3px solid brown;width: 60%;margin-top: 14%;width: 80%;text-align:center;height: 600px;" class="col-md-12">
	<div class="col-md-12"><h1><a href="produktPodrobne.php?idp=<?php echo $row['id_pro']; ?>"><?php echo $row['nazev'];?></a></h1></div>
		<div class="col-md-12"><img src="http://localhost/MAT/11eshop/produkty/<?php echo $row["obrazek"]; ?>"  width="400" height="400" alt=""></div>
		<div class="col-md-12"><p><?php echo $row['popis']; ?></p></div>
	<div style="color:red;" class="col-md-6">S DPH <br><?php  echo $row['cena']; ?>,-</div>
	<div class="col-md-6"> BEZ DPH <br><?php  echo round($row['cena']*0.79); ?>,-</div>
	<div class="col-md-3">
		 <form method="post" action="kosik.php?action=add&idp=<?php echo $row["id_pro"]; ?>">
                 
            <input type="number"min="1" max="20" value="1" name="quantity" value="1" class="slider" id="myRange" />

            <input type="hidden" name="hidden_name" value="<?php echo $row["nazev"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["cena"]; ?>" />
             <input type="hidden" name="hidden_image" value="<?php echo $row["obrazek"]; ?>" />

            <input style=" background-color:#333;  border: none; color: white;padding: 7,5px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;" type="submit" name="add_to_cart" style="margin-top:5px;" value="přidat do košíku" />
          
          </form></div>
</div>
<?php



				  	}
				  }


}

?>