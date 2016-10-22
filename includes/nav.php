<?php 
  
  
?>
<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">Admin Panel</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        
                        <li>
                            <a href="tasks.php">
                                <i class="fa fa-tasks"></i> Tasks
                            </a>
                        </li>
                        <li>
                            <a href="relation.php">
                                <i class="fa fa-comment-o"></i> Messages
                            </a>
                        </li>                        
                        <li>
                            <a href="inventory.php">
                                <i class="fa fa-plus"></i> Add product
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#changefb">
                                <i class="fa fa-facebook"></i> Change FB Feed
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              
                                    Howdy, <?php echo $row["username"]?>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                
                                <li><a href="logout.php">Logout</a></li>
                              </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>