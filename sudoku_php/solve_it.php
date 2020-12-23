<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SudokuSolver</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
</head>

<body>
    <nav class="navbar navbar-default custom-header">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php">Sudoku<strong><em>Solver</em></strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav links">
                    <li role="presentation"><a href="solve_it.php">Solve it </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
        if(isset($_POST['ok'])){
            $tab = $_POST['box'];
    ?>
        <div class="container table-responsive">
            <table class="table table-bordered table-striped">
            <?php
            //find the next empty cell
                function findNextCell($tab,&$x,&$y){
                for($i=0;$i<9;$i++)
                    for($j=0;$j<9;$j++)
                        if($tab[$i][$j] == 0 || $tab[$i][$j] == "" ){
                            $x=$i;
                            $y=$j;
                            return true;
                        }
                    return false;
                }

                function isValid($tab,$x, $y,$e){
                    for($i = 0 ; $i<9 ; $i++){
                        
                        if($tab[$i][$y]==$e){
                            return false;}
                    
                        if($tab[$x][$i]==$e){
                            return false;}
                        
                    }
                    
                    $startX = floor($x/3)*3;
                    $startY = floor($y/3)*3;
                    //echo $startX."//////".$startY."<br>";
                    for($i = $startX ; $i < $startX+3 ; $i++)
                        for($j = $startY ; $j < $startY+3 ; $j++){
                            //echo $i."/".$j."<br>";
                            if($tab[$i][$j]==$e){
                                return false;}}
                    
                    return true;
                }

                function solveIt(&$tab,$i,$j){
                    if(findNextCell($tab,$x,$y)){
                        $i=$x;
                        $j=$y;
                        for($e=1;$e<=9;$e++)
                            if(isValid($tab,$i,$j,$e)){
                                $tab[$i][$j]=$e;
                                
                                if(solveIt($tab,$i,$j))
                                    return true;}

                            $tab[$i][$j]=0;
                            return false;
                        }
                    return true;
                }
        if(solveIt($tab,0,0))
			echo"<tr><td colspan=9><center><h1>worked</h1></center></td></tr>";
		else
			echo"<tr><td>unsolvable</td></tr>";
		
		for($i=0;$i<9;$i++){
            echo"<tr>";
			for($j=0;$j<9;$j++)
                echo "<td>".$tab[$i][$j]."</td>";
           echo "</tr>";     
		}
		
            ?>
            <tr><td colspan="9"><center><a href="solve_it.php" class="btn btn-success" name="ok">reseat</a></center></td></tr>
            </table>
        </div>
    <?php    
        }
        else{
    ?>
    <div class="container">
        
    <form class="form" method="POST">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <td colspan="9"><h1><center><b>Sudoku</b></center></h1></td>
                </tr>
                <?php
                for($i=0;$i<9;$i++){
                    echo"<tr>";
                    for($j=0;$j<9;$j++){
                        echo"<td>
                        <input type=\"text\" class=\"form-control \" name=\"box[$i][$j]\">
                        </td>";
                    }
                    echo"</tr>";
                }  
                ?>
                <tr>
                    <td colspan="9">
                    <center>
                    <button type="submit" class="btn btn-success" name="ok">Submit</button>
                    </center>
                    </td>
                    </tr>
                
             </table>
        </div>
    </form>
    </div>
    <?php
        }
    ?>
    <footer>
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h3><a href="index.php">Sudoku<strong><em>Solver</em></strong></a></h3>
                <p class="links"><a href="index.php">Home</a><strong> · </strong><a href="solve_it.php">solve it</a><strong>
                <p class="company-name">SudokuSolver made by ilyas larhdid © 2020 </p>
            </div>
            <div class="col-md-4 col-sm-6 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p><span class="new-line-span">unknown adress</span> dakhla, morocco</p>
                </div>
                <div><i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left"> +212672023254</p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p> <a href="#" target="_blank">larhdidok@gmail.com</a></p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 footer-about">
                <h4>About the solve it</h4>
                <p>i made this website to solve sudoku's that seem hard
                </p>
                <div class="social-links social-icons"><a href="https://www.facebook.com/ilyas.larhdid"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="https://github.com/iLyasLarhdid/" target="_blank"><i class="fa fa-github"></i></a></div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
