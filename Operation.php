<?php
require_once ("db.php");
require_once ("component.php");
$con = CreatDb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}






function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM products";
if (isset($GLOBALS['con'])){
    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){

        echo "the result of calling getData is " .gettype($result);
        return $result;
    }
}
else{
    echo "database is not connected";
}

}

function createData(){
    $productname = textboxValue("product_name");
    $sku = textboxValue("sku");
    $productprice = textboxValue("product_price");
    $producttype = textboxValue("product_type");
    $size =intval(textboxValue("size"));
    $height = intval(textboxValue("height"));

    $width = textboxValue("width");
    $weight = textboxValue("weight");
    $length = textboxValue("length");

    if($productname && $sku && $productprice&& $producttype){

        $sql = "INSERT INTO products (product_name, sku, product_price,
                      product_type,size,height,width ,weight,length) 
                        VALUES ('$productname','$sku',
                                '$productprice','$producttype','$size',
                                '$height','$width','$weight','$length')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
        TextNode("error", "Provide Data in the Textbox");
    }
}

// update dat
function UpdateData(){
    $productid = textboxValue("Product_Id");
    $productname = textboxValue("product_name");
    $sku = textboxValue("sku");
    $productprice = textboxValue("product_price");
    $producttype = textboxValue("product_type");
    $size = textboxValue("size");
    $height = textboxValue("height");

    $width = textboxValue("width");
    $weight = textboxValue("weight");
    $length = textboxValue("length");

    if($productname && $sku && $productprice){
        $sql = "
                    UPDATE products SET product_name='$productname', sku = '$sku', product_price = '$productprice',product_type='$producttype',size='$size' ,height='$height',width='$width', weight='$weight',length='$length' WHERE id='$productid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $productid = (int)textboxValue("Product_Id");

    $sql = "DELETE FROM products WHERE id=$productid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}




// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}



function Category_Selection($link) {
    global $connection;
    $options="";
    if(isset($_GET["producttypes"])) {
        $query="SELECT producttype.id, producttype.producttypes ";
        $query.="FROM producttype ";
        $query.="ORDER BY producttype.producttypes ASC";
        $result=mysqli_query($query, $connection);
        $class_id=$_GET['producttypes'];

        if(!$result){
            die("Database query failed: " . mysqli_error());
        }
        while ($row=mysqli_fetch_array($result)) {
            $name=$row["producttypes"];
            $id=$row["id"];
            $link2=$link."&id={$id}";
            $options.="<OPTION VALUE=\"$link2\" ";
            if(isset($_GET["id"])) {
                $category_id = $_GET['id'];
                if($id==$category_id) {
                    $options.=" selected=\"selected\" ";
                }
            }
            $options.=" >".$name.'</OPTION>';
        }
    } else {
        $options.="<OPTION selected=\"selected\" VALUE=0>First Select Class</OPTION>";
    }
    return($options);
}



