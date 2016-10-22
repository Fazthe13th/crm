<?php include 'includes/header.php' ?>
<title>CRM - Test Panel</title>

</head>
<body>

<div class="wrapper">
    <?php include 'includes/sidenav.php' ?>

    <div class="main-panel">
        
        <?php include 'includes/nav.php' ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form" method="post">
                                  <fieldset class="form-group">
                                    <label for="net profi">Net Profit</label>
                                    <input type="text" class="form-control" id="profit" placeholder="Put in Dollar($)"/>
                                    
                                  </fieldset>
                                  
                                  <fieldset class="form-group">
                                    <label for="exampleSelect1">Example select</label>
                                    <select class="form-control" id="month">
                                      <option value="1">January</option>
                                      <option value="2">February</option>
                                      <option value="3">March</option>
                                      <option value="4">April</option>
                                      <option value="5">May</option>
                                      <option value="6">June</option>
                                      <option value="7">July</option>
                                      <option value="8">August</option>
                                      <option value="9">September</option>
                                      <option value="10">October</option></option>
                                      <option value="11">November</option>
                                      <option value="12">December</option>
                                    </select>
                                  </fieldset>
                                  <fieldset class="form-group">
                                    <label for="exampleSelect1">Example select</label>
                                    <select class="form-control" id="year">
                                      <option value="1">2011</option>
                                      <option value="2">2012</option>
                                      <option value="3">2013</option>
                                      <option value="4">2014</option>
                                      <option value="5">2015</option>
                                      <option value="6">2016</option>
                                      
                                    </select>
                                  </fieldset>
                                 
                                  <button id="test_insert" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                
                                    <div id="previewclass">
                                        <a id="close" href="#" data-dismiss="alert" aria-label="close"></a>
                                      <strong id="preview"></strong>
                                    </div>
                                
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="footer">
                <?php include 'includes/copyright.php' ?>
        </footer>
        </div>


        

    </div>



</body>
<?php include 'includes/footer.php' ?>
            
