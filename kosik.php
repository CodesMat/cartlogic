
               
<?php 
$idpos=$_GET['idp'];
include_once 'header.php';
?>
<div class="container mt-5 mb-5" style="background: white;">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-2">
                <?php
$aa =0;

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {

        $item_array_idp = array_column($_SESSION["shopping_cart"], "item_idp"); //uloží do $item_array_idp vše ze session shopping card co ma stejne item_idp (je tam vic produktu a ono to vezme např jen produkt 170)
        if(!in_array($_GET["idp"], $item_array_idp))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_idp'          =>  $_GET["idp"],
                'item_name'         =>  $_POST["hidden_name"],
                'item_price'        =>  $_POST["hidden_price"],
                'item_quantity'     =>  $_POST["quantity"],
                'item_image'        =>  $_POST["hidden_image"]

            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
        
        }
    }
    else
    {
        $item_array = array(
            'item_idp'          =>  $_GET["idp"],
            'item_name'         =>  $_POST["hidden_name"],
            'item_price'        =>  $_POST["hidden_price"],
            'item_quantity'     =>  $_POST["quantity"],
            'item_image'        =>  $_POST["hidden_image"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}//isset prdat do kosiku
        // code...
        




if(isset($_GET["action"]))
{   
    


    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_idp"] == $_GET["idp"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
            }
        }
    }
    if ($_GET['action']=="addOne") {
$item_array =   $_SESSION["shopping_cart"];
foreach($item_array as $keys => $values){
    //echo $values['item_idp'];
    if ($_GET['idp']==$values['item_idp']) {
                echo "aa".json_encode($values['item_quantity']);
                $a = json_encode($values['item_quantity']);
                echo "a".$a;
                    $b = intval($a);
                    echo "b".$b-10;

    }
    
}

        
// Array representing a possible record set returned from a database

 

        foreach($_SESSION["shopping_cart"] as $keys => $values){
        if ($values["item_idp"]==$_GET["idp"]){

        }
    }
}

}//isset actionm ? 

?>

<?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                    ?>
                 


<div style="margin: 2%;width:80%;border:1px solid black;" class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                <div class="col-md-6">
                    <img style="width: 200px;" height="100" src="http://localhost/MAT/11eshop/produkty/<?php echo $values["item_image"]; ?>" width="70">
                </div>
                <div class="d-flex flex-column align-items-center product-details col-md-6"><span  class="font-weight-bold"><h4><?php echo$values["item_name"];?></h4></span>
                    <div class="d-flex flex-row product-desc">
                        
                       
                    </div>
                </div>
                
                <div>
                    <h5 class="text-grey">cena:<?php echo$values["item_price"]?> kč</h5>

                </div>
                <div>
                    <h5 class="text-grey">počet:<?php echo$values["item_quantity"]?></h5>
                    
                </div>




 

                <div class="d-flex align-items-center ">
                    <a style="color:white;" href="kosik.php?action=delete&idp=<?php echo $values["item_idp"]; ?>"><i class="fa fa-trash mb-1 text-danger"></i>
                    </a>
               
                </div>
            </div>

                    
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                
            
              
               


                
              
                </div>
            </div>
        </div>
        
                  
                    <?php
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                        } //foreach 
                    ?>
                    
  </div>
            




                        <a style="text-decoration:none;color:green;">Celková cena: </a>

<h5> <?php echo number_format($total, 2); ?> Kč</h5>
                    <?php
                    ?>
                    <br>

                    <?php
if (!empty($_SESSION['shopping_cart'])) {
?>    <div style="margin-left: 3%;" class="col-md-1"><a href="zaplatit.php">Dokončit nákup:</a></div>
    <?php
}
}
    ?>

    </div>



                
          
