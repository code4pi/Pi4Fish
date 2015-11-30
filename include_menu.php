<!-- ------------------------------------------------------ MENU BAR -->

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="40"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><i class="fa fa-home fa-1x"></i>Home</a></li>
        <!-- <li>&nbsp&nbsp  </li> -->
        <li style="padding-left:5px;"><?php print $maintenance_led;?></li>
        <li><a href="power.php">&nbspPower</a></li>
        <li><a href="scheduler.php">Schedule</a></li>
        <li><a href="statistics.php">Statistics</a></li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Maintenance<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="chem.php">Chemical Readings</a></li>
            <li class="divider"></li>
            <li><a href="filter.php">Filter Maintenance</a></li>
          <li class="divider"></li>
        <li><a href="waterchange.php">Water Change</a></li>


          </ul>
        </li>



        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Species<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="species.php">View Species</a></li>
            <li class="divider"></li>
            <li><a href="add_species.php">Add Species</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="admin_theme.php">Look and Feel</a></li>
            <li class="divider"></li>
            <li><a href="admin_general.php">General Settings</a></li>
            <li class="divider"></li>
            <li><a href="admin_gpio.php">GPIO Settings</a></li>
            <li class="divider"></li>
            <li><a href="admin_matrix.php">Phase Matrix</a></li>

          </ul>
        </li>




        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Temperature <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="temperature.php">Table View</a></li>
            <li class="divider"></li>
            <li><a href="temperature_graphs.php">Graph View</a></li>
          </ul>
        </li>


          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Help<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="http://www.subzerobc.com/ticket" target="_blank">Support Ticket</a></li>
            <li class="divider"></li>
            <li><a href="http://www.subzerobc.com/jayfish/help" target="_blank">User Guide</a></li>
          </ul>
        </li>

 	<ul class="nav navbar-nav">
         <li><a href="admin-submit.php?optionget=logout">Logout</a></li>
    </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- ------------------------------------------------------ MENU BAR -->