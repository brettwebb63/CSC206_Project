<?php

class layout
{

    /**
     * Creates the top part of the page.  This will usually be the HEAD area plus the nav bar and anything else that is
     * above the "content" of that page.
     *
     * @param $title
     */
    public static function pageTop($title)
    {
        // This builds the web path to the app.css file and is embedded in the header below
        $appcss = WS_CSS . 'app.css';

        echo <<<pagetop
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>$title</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="author" content="Scott Madeira">
        <meta name="description" content="Everything you wanted to know about web programming">
        <meta name="keywords" content="xampp, php, mysql, html, web programming">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lte IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <!-- Embed fonts for the page -->
        <link href='https://fonts.googleapis.com/css?family=Miriam+Libre:400,700|Source+Sans+Pro:200,400,700,600,400italic,700italic' rel='stylesheet' type='text/css'>
        
        <!-- Latest compiled and minified CSS - get from getbootstrap.com-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" href="$appcss">
    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="home language-php">
        
        <header class="navbar navbar-default navbar-fixed-top topnav" role="banner">
            <div class="container topnav">
                <nav role="navigation">
                    <div class="container-fluid">
                      <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                                <a class="navbar-brand topnav" href="/">CSC206 Project</a>
                        </div>
        
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse-1">						  
                            <ul class="nav navbar-nav  navbar-right">
                                
                                <li><a href="/about.php">About</a></li>
                                                        
                                <li><a href="/events.php">Events</a></li>	                       	                       
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">                                        
                                        <li><a href="/getPosts.php">List</a></li>
                                        <li><a href="/createPost.php">New</a></li>                                    
                                    </ul>
                                </li>
                                <li><a href="/login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>	                       
                            </ul>						
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>		
        </header>
            <div class="intro-header">
	   	<h2>Web Development</h2>
	</div>
pagetop;

    }

    /**
     * Creates the bottom part of the page.  This will usually be the footer area and anything else that comes below
     * the page content.
     */
    public static function pageBottom()
    {

        echo <<<pagebottom
        <!-- Footer -->
	<div class="site-footer">
	    <div class="row">
	        
	    	<p>All content copyright Scott Madeira 2017</p>
	        
	    </div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
pagebottom;
    }



    /**
     * This method will take a 2-dimensional array and create a table.
     * The header columns are derived from the keys of the row data
     *
     * @param $data
     * @return string
     */
    public function buildTable($data)
    {
        // Start building the table
        $table = '<table class="table table-hover">';

        // Create the table header row
        $header = '<tr>';

        foreach ( $data[ 0 ] as $key => $cell ) {
            $header .= '<th>' . $key . '</th>';
        }
        $header .= '</tr>';

        // Add the header to the table
        $table .= $header;

        // Build the table rows
        $rowHTML = '';

        // Loop through each row of data and build a row
        foreach ( $data as $row ) {
            $rowHTML .= '<tr>';

            // Loop through each cell and create the cells
            foreach ( $row as $cell ) {
                $rowHTML .= '<td>' . $cell . '</td>';
            }
            $rowHTML .= '</tr>';
        }

        // Add the rows to the table
        $table .= $rowHTML;

        // Close out the table
        $table .= '</table>';

        return $table;
    }

}