<?php include 'includes/header.php'?>
<title>CRM - Customers Info</title>

</head>
<body>

<div class="wrapper">
    <?php include 'includes/sidenav.php'?>

    <div class="main-panel">
        
        <?php include 'includes/nav.php'?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7">
                 <div style="background-color: white" class="well">

                    <h4>Inventory Search</h4>
                    <div class="input-group col-md-4">
                        <input id="search_inventory" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
            

                <div style="background-color: white" class="well">

                <!-- First Blog Post -->
                <h2>
                    <a>Inventory Management</a>
                </h2>
          <div  id="inventory_data" style="overflow: auto; height: 500px">                       
            

                

            
            </div>  
      </div>
    </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-5">

                <!-- Blog Search Well -->
                

                <!-- Blog Categories Well -->
                <div style="background-color: white" class="well">
                    <h4>Add new Item</h4>
                    


                        <form id="addNewForm" class="form-horizontal" action='' method="POST">
                          <fieldset>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Name</label>
                              <div class="col-md-7">
                                <input type="text" id="productName" name="Name" placeholder="" class="form-control name">
                              </div>
                            </div>
                         
                            <div class="form-group">
                              <label class="col-lg-2" for="ProductType">Product Type</label>
                              <div class="col-md-7">
                                <select id="productType" name="ProductType" class="form-control product-type">
                                    <option value=""></option>
                                    <option value="Stationery">Stationery</option>
                                    <option value="Elements">Elements</option>
                                    <option value="Coatings">Coatings</option>
                                    <option value="Pharmaceutical Products">Pharmaceutical Products</option>
                                    <option value="Home Accessory">Home Accessory</option>
                                    <option value="Food Products">Food Products</option>
                                    <option value="Telecommunication Equipments">Telecommunication Equipments</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2" for="ProductType">Distributor</label>
                              <div class="col-md-7">
                                <select id="distributor" name="Distributor" class="form-control product-type">
                                    <option value=""></option>
                                    <option value="Canteen Stores Department">Canteen Stores Department</option>
                                    <option value="Habib Group">Habib Group</option>
                                    <option value="Jamuna Group">Jamuna Group</option>
                                    <option value="Meghna Group">Meghna Group</option>
                                    <option value="Meghna Group of Industries">Meghna Group of Industries</option>
                                    <option value="Nasir Group">Nasir Group</option>
                                    <option value="Navana Group">Navana Group</option>
                                    <option value="Partex Group">Partex Group</option>
                                    <option value="PHP Group">PHP Group</option>
                                    <option value="Shyampur Sugar Mills">Shyampur Sugar Mills</option>
                                </select>
                              </div>
                            </div>
                             <div class="form-group">
                              <label class="col-lg-2"  for="Name">Price</label>
                              <div class="col-md-7">
                                <input type="text" id="price" name="Price" placeholder="" class="form-control name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Sale Price</label>
                              <div class="col-md-7">
                                <input type="text" id="salePrice" name="SalePrice" placeholder="" class="form-control name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Weight</label>
                              <div class="col-md-7">
                                <input type="text" id="weight" name="weight" placeholder="" class="form-control name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Quantity</label>
                              <div class="col-md-4">
                                <input type="text" id="quantity" name="quantity" placeholder="" class="form-control name">
                              </div>
                            </div>
                          </fieldset>
                          <button id="add_new" type="submit" class="btn btn-primary right">Add</button>
                        </form>
                </div>
                
                <div style="background-color: white" class="well">
                    <h4>Edit Inventory</h4>
                    


                        <form id="edit_form" class="form-horizontal" action='' method="POST">
                          <fieldset>
                          <div class="form-group">
                              <label class="col-lg-2"  for="Name">Product ID</label>
                              <div class="col-md-4">
                                <input type="text" id="id_up" name="id" placeholder="" class="form-control name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Name</label>
                              <div class="col-md-7">
                                <input type="text" id="name_up" name="Name" placeholder="" class="form-control name">
                              </div>
                            </div>
                         
                            <div class="form-group">
                              <label class="col-lg-2" for="ProductType">Product Type</label>
                              <div class="col-md-7">
                                <select id="productType_up" name="ProductType" class="form-control product-type">
                                    <option value=""></option>
                                    <option value="Stationery">Stationery</option>
                                    <option value="Elements">Elements</option>
                                    <option value="Coatings">Coatings</option>
                                    <option value="Pharmaceutical Products">Pharmaceutical Products</option>
                                    <option value="Home Accessory">Home Accessory</option>
                                    <option value="Food Products">Food Products</option>
                                    <option value="Telecommunication Equipments">Telecommunication Equipments</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2" for="ProductType">Distributor</label>
                              <div class="col-md-7">
                                <select id="distributor_up" name="Distributor" class="form-control product-type">
                                    <option value=""></option>
                                    <option value="Canteen Stores Department">Canteen Stores Department</option>
                                    <option value="Habib Group">Habib Group</option>
                                    <option value="Jamuna Group">Jamuna Group</option>
                                    <option value="Meghna Group">Meghna Group</option>
                                    <option value="Meghna Group of Industries">Meghna Group of Industries</option>
                                    <option value="Nasir Group">Nasir Group</option>
                                    <option value="Navana Group">Navana Group</option>
                                    <option value="Partex Group">Partex Group</option>
                                    <option value="PHP Group">PHP Group</option>
                                    <option value="Shyampur Sugar Mills">Shyampur Sugar Mills</option>
                                </select>
                              </div>
                            </div>
                             <div class="form-group">
                              <label class="col-lg-2"  for="Name">Price</label>
                              <div class="col-md-7">
                                <input type="text" id="price_up" name="Price" placeholder="" class="form-control name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Sale Price</label>
                              <div class="col-md-7">
                                <input type="text" id="sa_price_up" name="SalePrice" placeholder="" class="form-control name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Weight</label>
                              <div class="col-md-7">
                                <input type="text" id="weight_up" name="weight" placeholder="" class="form-control name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2"  for="Name">Update Quantity</label>
                              <div class="col-md-4">
                                <input type="text" id="quantity_up" name="quantity" placeholder="" class="form-control name">
                              </div>
                            </div>
                          </fieldset>
                          <button id="update_in" type="submit" class="btn btn-primary right">Update</button>
                        </form>
                </div>
                <div style="background-color: white" class="well">
                    <h4>Delete Item</h4>
                    


                         <form id="delete_form" class="form-inline">
                          <div class="form-group">
                            <label for="email">Product ID:</label>
                            <input type="text" class="form-control" id="de_id">
                          </div>
                          
                          
                          <button id="delete_pro" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </div>

                <!-- Side Widget Well -->
                

            </div>
                    </div>
                </div>
            </div>
            
            <footer class="footer">
                <?php include 'includes/copyright.php'?>
        </footer>
        </div>


        

    </div>




<?php include 'includes/footer.php'?>