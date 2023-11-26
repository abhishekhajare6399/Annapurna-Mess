<?php include'asession.php'?>
<!DOCTYPE html>
<html lang="en">
<?php include'ahead.php' ?>
<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="ahome.php"><?php echo $name?></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;
                            Home</a></li>
                    <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li>
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order
                            History</a></li>
                    <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a>
                    </li>
                    <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li>
                    <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a>
                    </li>
                    <form action="search.php" method="POST">
                        <div class="input-group" style="padding: 10px;">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" button type="submit" name="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form><br>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2 sidenav hidden-xs"><br><br><br>
                <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" button type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form><br>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;
                            Home</a></li><br>
                    <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li><br>
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li><br>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li><br>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <br>
                    <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order
                            History</a></li><br>
                    <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a>
                    </li><br>
                    <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li>
                    <br>
                    <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a>
                    </li><br>
                </ul><br>
            </div>
            <?php include'anav.php'?>

            <div class="row">
                <div class="col-sm-5">
                    <div class="well">
                        <?php include 'apiechart.php'?>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="well">
                        <?php include'acolchart.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php include 'afooter.php'?>

</body>

</html>