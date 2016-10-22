<?php include 'includes/header.php' ?>
<title>CRM - Tasks</title>



</head>
<body>

<div class="wrapper">
    <?php include 'includes/sidenav.php' ?>

    <div class="main-panel">
        
        <?php include 'includes/nav.php' ?>

            <div class="content">
            <div class="row">
            
            <div class="col-md-12">
                     <form id="task_form" class="form-inline" role="form">
                      <div class="form-group">
                        
                        <input id="task_name" type="text" class="form-control" placeholder="Name">
                      </div>
                      <div class="form-group">
                        
                        <input id="task_dec" type="text" class="form-control" placeholder="Description">
                      </div>
                      <div class="form-group">
                        
                        <fieldset class="form-group">
                                    
                                    <select id="importance" class="form-control">
                                         <option value="" disabled selected>Importance</option>
                                      <option value="Very Important">Very Important</option>
                                      <option value="Important">Important</option>
                                      <option value="Not Important">Not Important</option>
                                      
                                    </select>
                                  </fieldset>
                      </div>
                      <div class="form-group">
                        
                        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
                      <!-- polyfiller file to detect and load polyfills -->
                      <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
                      <script>
                        webshims.setOptions('waitReady', false);
                        webshims.setOptions('forms-ext', {types: 'date'});
                        webshims.polyfill('forms forms-ext');
                      </script>

                        <input id="date" type="date" class="form-control" />
                      </div>
                      <div class="form-group input-group clockpicker">
                        <input id="task_time" type="text" class="form-control" placeholder="Time">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        </div>
                        
                        <div class="form-group right">
                      <button id="add_task" type="submit" class="btn btn-default bg-red-active right" style="margin-top: 3px;margin-bottom: 3px;"><i class="fa fa-plus"></i></button>
                      </div>
                    </form>
            
            
                    
     
           
           
                        
           </div>
            
            </div>
                  <div class="row">
                    <div class="col-md-12" style="background-color: white;">
                                <h4>Task List of Today</h4>
            <div class="table-responsive" id="task_table">

                
              
                
                
                
            </div>
                        
                        
                        </div>
                    </div> 
            </div>
            
            <footer class="footer">
                <?php include 'includes/copyright.php' ?>
        </footer>
        </div>


        

    </div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
                        <form id="update_form">
                        <input id="task_name_edit" type="text" class="form-control" placeholder="Name">
                      </div>
                      <div class="form-group">
                        
                        <input id="task_dec_edit" type="text" class="form-control" placeholder="Description">
                      </div>
                      <div class="form-group">
                        
                        <fieldset class="form-group">
                                    
                                    <select id="importance_edit" class="form-control">
                                         <option value="" disabled selected></option>
                                      <option value="Very Important">Very Important</option>
                                      <option value="Important">Important</option>
                                      <option value="Not Important">Not Important</option>
                                      
                                    </select>
                                  </fieldset>
                      </div>
                      
                      
                        
                      </form>
      </div>
          <div class="modal-footer ">
        <button  id="update" data-dismiss="modal" type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button id="delete_task" data-dismiss="modal" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button id="" type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>


<?php include 'includes/footer.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
        function task_output()
        {
          $.ajax(
                {
                   url: 'core/process/task_show.php',
                   method: 'POST',
                   success: function(data)
                   {
                    $('#task_table').html(data);
                   }
                }
            );
        };
        task_output();
        
        $('#add_task').click( function(event)
        
        {
            event.preventDefault();
            
            var date = $('#date').val();
            var time = $('#task_time').val();
            var importance = $('#importance option:selected').text();
            var task_name = $('#task_name').val();
            var task_dec = $('#task_dec').val();
            $.ajax(
            {
              url: 'core/process/task_add.php',
              method: 'POST',
              dataType: 'html',
              data: {date:date, time:time, importance:importance, task_name:task_name, task_dec:task_dec},
              success: function(data)
              {
                alert(data);
                task_output();
              }
            }
            );
            $("#task_form")[0].reset();
        });
        function edit_task(id,coloum_name,value)
        {
          $.ajax({
            url: 'core/process/edit_task.php',
            method: 'POST',
            dataType: 'html',
            data: {id:id, coloum_name:coloum_name, value:value},
            success: function(data)
            {
              
              task_output();
              $("#update_form")[0].reset();    
            }
          });
        }
        
        $(document).on("click", ".edit", function () {
                    //first text box
                    var id = $(this).data("id1");
                    
                    $('#update').click(function()
                      {
                        
                    var date = $('#date_edit').val();
                    var time = $('#task_time_edit').val();
                    var importance = $('#importance_edit option:selected').text();
                    var task_name = $('#task_name_edit').val();
                    var task_dec = $('#task_dec_edit').val();
                    if(importance != '')
                    {
                      edit_task(id,'importance',importance);

                    }
                    
                    if(task_name != '')
                    {
                      edit_task(id,'task_name',task_name);
                    }
                    if(task_dec != '')
                    {
                      edit_task(id,'task_dec',task_dec);
                    }
                    id=null;
                        
                      
                    });
                    
                       

                       
                    //second text box
                    
                });
        $(document).on("click", ".delete", function () {
                    //first text box
                    
                    var id = $(this).data("id2");
                    $('#delete_task').click(function()
                      {
                       $.ajax({
                        url: 'core/process/delete_task.php',
                        method: 'POST',
                        dataType: 'html',
                        data: {id:id},
                        success: function(data)
                        {

                          task_output();
                          
                        }
                      });  
                        });    

                       
                    //second text box
                    
                });
    });
</script>



