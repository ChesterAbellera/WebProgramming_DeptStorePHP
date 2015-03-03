<?php
$session_id = session_id();

if ($session_id == "")
{
    session_start();
}

if (isset($_SESSION['username']))
{
    echo '<br><p class="toolbar"><a href="home.php">Home</a></p>';
    echo '<p class="toolbar"><a href="logout.php">Logout</a></p>';
}
else 
{
    echo '<br><p class="toolbar"><a href="index.php">Home</a></p>';
    echo '<p class="toolbar"><a href="login.php">Login</a></p>';
}

/* Primary Toolbar Code

if (isset($_SESSION['username']))
{
    echo '<p><a href="home.php">Home</a></p>';
    echo '<p><a href="logout.php">Logout</a></p>';
}
else 
{
    echo '<p><a href="index.php">Home</a></p>';
    echo '<p><a href="login.php">Login</a></p>';
}
 */