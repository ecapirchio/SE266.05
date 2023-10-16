<h1>PHP and MySQL - Emma Capirchio</h1>
<p>
    Welcome to my PHP and MySQL page. You can find an overview of all my working PHP projects along with my code.
</p>

<h2>Assignment Overview</h2>

<ul>
<li><a href="../week1/MiniTaskC/index.php">Week 1 - Mini Task C</a></li>
<li><a href="../week1/MiniTaskD/index.php">Week 1 - Mini Task D</a></li>
<li><a href="../week1/MiniTaskE/index.php">Week 1 - Mini Task E</a></li>
<li><a href="../week1/MiniTaskF/index.php">Week 1 - Mini Task F</a></li>
<li><a href="../week1/MiniTaskG/index.php">Week 1 - Mini Task G</a></li>
<li><a href="../week2/index.php">Week 2</a></li>
<li><a href="../week3/index.php">Week 3</a></li>
<li><a href="../week4/index.php">Week 4</a></li>
<li><a href="../week5/index.php">Week 5</a></li>
<li><a href="../week6/index.php">Week 6</a></li>
<li><a href="../week7/index.php">Week 7</a></li>
<li><a href="../week8/index.php">Week 8</a></li>
<li><a href="../week9/index.php">Week 9</a></li>
<li><a href="../week10/index.php">Week 10</a></li>
</ul>

<?php
    $file = basename($_SERVER['PHP_SELF']);
    $mod_date=date("F d Y h:i:s A", filemtime($file));
    echo "File last updated $mod_date";
?>