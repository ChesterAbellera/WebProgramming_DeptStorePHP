<?php
$session_id = session_id();

if ($session_id == "")
{
    session_start();
}

if (isset($_SESSION['username']))
{
    echo '<a href="logout.php">Logout <span class="glyphicon glyphicon-off"></span></a>';
}
else 
{
    echo '<a href="login.php">Login <span class="glyphicon glyphicon-user"></span></a>';
    echo '<a>0 Items <span class="glyphicon glyphicon-shopping-cart"></span></a>';
    echo '<a>Wish List <span class="glyphicon glyphicon-heart"></span></a>';
     
}