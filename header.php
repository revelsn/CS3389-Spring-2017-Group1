<?php
	session_start(); //start the session. if there's already an exisiting session, it will be continued
	
	//re-direct to the login page if needed. We're including this file on the login page or the login_submit page, so check to make sure we're not on the login page or we'd have an infinite re-direct
 	if(!isset($_SESSION['user_id']) && !stristr($_SERVER["PHP_SELF"], 'login'))
	{
		header("Location: login.php");
	}
	//include the database connection stuff so we don't have to duplicate it everywhere */
	include 'db_conn.php';
	

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>
<body>

			<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='logOut.php'><span class="glyphicon glyphicon-plus"></span>Log Out</a>
				</div>

<?php
/*if($_session['role'] == 3)
{
    echo "<nav class='navbar navbar-default'>
        <div class='container-fluid'>
          <div class='navbar-header'>
              <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Dropdown <span class='caret'></span></a>
                <ul class='dropdown-menu'>
                  <li><a href='#'>Action</a></li>
                  <li><a href='#'>Another action</a></li>
                  <li><a href='#'>Something else here</a></li>
                  <li role='separator' class='divider'></li>
                  <li class='dropdown-header'>Nav header</li>
                  <li><a href='#'>Separated link</a></li>
                  <li><a href='#'>One more separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>";
}else
{if($_session['role'] == 2)
{
	echo "<nav class='navbar navbar-default'>
        <div class='container-fluid'>
          <div class='navbar-header'>
              <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Dropdown <span class='caret'></span></a>
                <ul class='dropdown-menu'>
                  <li><a href='#'>Action</a></li>
                  <li><a href='#'>Another action</a></li>
                  <li><a href='#'>Something else here</a></li>
                  <li role='separator' class='divider'></li>
                  <li class='dropdown-header'>Nav header</li>
                  <li><a href='#'>Separated link</a></li>
                  <li><a href='#'>One more separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>";
}else if($_session['role'] == 1)
{
echo "<nav class='navbar navbar-default'>
        <div class='container-fluid'>
          <div class='navbar-header'>
              <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Dropdown <span class='caret'></span></a>
                <ul class='dropdown-menu'>
                  <li><a href='#'>Action</a></li>
                  <li><a href='#'>Another action</a></li>
                  <li><a href='#'>Something else here</a></li>
                  <li role='separator' class='divider'></li>
                  <li class='dropdown-header'>Nav header</li>
                  <li><a href='#'>Separated link</a></li>
                  <li><a href='#'>One more separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>";

}
}*/

?>
<!-- The closing tags are on the footer.php page which is also included on all pages  -->
