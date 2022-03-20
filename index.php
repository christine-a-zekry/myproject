<?php

require_once ("./php/component.php");
require_once ("./php/db.php");
require_once ("./php/Operation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product lIST</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="MyStyle.css">
<style type="text/css">
    #hidden-panel {
        display: none;
    }

    #hidden-panel_height {
        display: none;
    }
    #hidden-panel3 {
          display: none;
      }
    #hidden-panel4 {
        display: none;
    }
    #hidden-panel5 {
        display: none;
    }

</style>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script>
    <script>
        $(document).ready(function() {
            $("#product_type").change(function() {
                if ($("#product_type").val() =="DVD" ) {
                    $("#hidden-panel").show()
                } else {
                    $("#hidden-panel").hide()
                }
                if ($("#product_type").val() == "furniture") {
                    $("#hidden-panel_height").show()

                } else {
                    $("#hidden-panel_height").hide()
                }
                if ($("#product_type").val() == "Book") {
                    $("#hidden-panel3").show()

                } else {
                    $("#hidden-panel3").hide()
                }
            })
        });
    </script>
</head>
<body style="background-color: white">
<main>

<div class="container text-center">
    <h1 class="py-4 bg-dark text-light rounded">My Products</h1>
    <div class="d-flex justify-content-center">

    <form action="" method="post" class="w-50">
        <div class="py-2">
            <?php inputElement("Product_Id","Product_Id","Product_Id","");?>

        </div>
        <div class="py-2">
            <?php inputElement("sku","sku","sku","");?>

        </div>

<div class="pt-2">

    <?php inputElement("product_name","product_name","product_name","");?>

</div>
        <div class="py-2">
            <?php inputElement("product_price","product_price","product_price","");?>

        </div>


        <div class="py-2">
            <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text">
            <label>product_type</label>


            </div>
            </div>
                <select  class="form-select" aria-label="Default select example" name="product_type" id="product_type" value="product_type" runat="server">
                    <option selected>Type switcher</option>
                    <option value="DVD">DVD</option>

                    <option value="furniture">furniture</option>
                    <option value="Book">Book</option>
                </select>
        </div>
            <div class="py-2"name="hidden-panel_height" id="hidden-panel_height">

            <?php input_Element("length","length","length","");?>
            <?php input_Element("height","height","height","");?>
            <?php input_Element("width","width","width","" );?>

        </div>
            <div class="py-2" name="hidden-panel" id="hidden-panel">

                <?php input_Element("size","size","size","");?>

        </div>
            <div class="py-2"name="hidden-panel3" id="hidden-panel3">

                <?php input_Element("weight","weight","weight","");?>

        </div>
            <div class="py-2" style="display: none">

        </div>
        </div>
        </div>
        <div class="d-flex justify-content-center">
            <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
            <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
            <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
            <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>



        </div>

    </form>


    </div>

    <!-- Bootstrap table  -->
    <div class="d-flex table-data">
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Sku</th>
                <th>Name</th>
                <th> Price</th>
                <th>Product_type</th>
                <th>size</th>
                <th>height</th>
                <th>width</th>

                <th>weight</th>

                <th>length</th>

                <th>edit</th>


            </tr>
            </thead>
            <tbody id="tbody">
            <?php


                $result = getData();

                if($result){

                    while ($row = mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>

                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['sku']; ?></td>

                            <td data-id="<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo '$' . $row['product_price']; ?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo  $row['product_type']; ?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo  $row['size']; ?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo  $row['height']; ?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo  $row['width']; ?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo  $row['weight']; ?></td>
                            <td data-id="<?php echo $row['id']; ?>"><?php echo  $row['length']; ?></td>

                            <td ><i class="fas fa-edit btnedit"  style="cursor: pointer" data-id="<?php echo $row['id']; ?>"></i></td>

                            <td ></td>
                        </tr>

                        <?php
                    }


            }


            ?>
            </tbody>

        </table>
</div>
</main>


<!-- Scrollable modal -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="php/main.js"></script>
</body>
</html>