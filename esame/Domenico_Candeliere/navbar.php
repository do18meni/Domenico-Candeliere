<?php
include 'db_connection.php';
			session_start();
            if (!isset($_SESSION['user'])||$_SESSION['user']=="") {
            echo "<div class='nav-bar'>
                          <ul>
                              <li><a class='active' style='color:white;' href='index.php'>Home</a></li>
                              <li style='float:right'><a class='active' style='color:white;' href='login.php'>Accedi</a></li>
                              <li style='float:right'><a style='color:white;' href='register.php'>Registrati</a></li>
                          </ul>
                      </div>";

        }else {
                          	
                                echo"<div class='nav-bar'>
                          			<ul>
                                        <li><a class='active' style='color:white;' href='index.php'>Home</a></li>    
                                        <li><a style='color:white;' href='ricette.php'>Le tue ricette</a></li>
                                        <li><a style='color:white;' href='ingredienti.php'>I tuoi ingredienti</a></li>
                                        
                                        <li style='float:right'>
                                                  <form style='float: right;' method='POST'>
                                                      <button class='active' name='logout' style='color:white; padding: 14px 16px; border: none; font-size: 16px; cursor: pointer; border-radius: 0px;'>Log out</button>
                                                  </form>
                                        </li>
                                        <li style='float:right'><a style='color:white; cursor: pointer;' href='private.php'>Benvenuto ".$_SESSION['user']."</a></li>
                                    </ul>
                      			</div>"; 
                            }
        
        if(array_key_exists('logout', $_POST)){
                $_SESSION = array();
                header("Location: login.php");  
        }
        
?>