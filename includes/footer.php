<!-- Modal -->



<div class="modal fade" id="changefb" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Change Facebook Feed
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Page ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="feed_id" placeholder="Page Unique ID"/>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      
                        <p>
                            Ex: if your page link is https://www.facebook.com/<b>breedapps</b> <br />
                            Then put <b>breedapps</b> in the text field
                        </p>
                      
                    </div>
                        
                    
                  </div>
                  
                  
                  
                </form>
                
                
                
                
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button id="change_feed" type="button" class="btn btn-primary" data-dismiss="modal">
                    Change Feed
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end-->

</body>
<!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
    
      
  
	

    

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="js/light-bootstrap-dashboard.js"></script>

	
    <!-- Custom script for CRM! -->
    <script src="js/script.js"></script>
    <!-- Chatjs script! -->
    <script src="js/Chart.min.js"></script>
    
    
    <script type="text/javascript" src="js/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript">
        $('.clockpicker').clockpicker({
                    
                    donetext: 'Done',
                    'default': 'now'
                });
       
    </script>
   
    
    
    
   
  
    

</html>