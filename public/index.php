<?php

// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');

// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');

// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);


// Get the stories for column 1 from the database
$sql = 'select title, content, firstname, lastname from posts, users where posts.userid = users.id';
$posts = $db->query($sql);

// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);


// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
// include(FS_TEMPLATES . 'pageTop.php')
/**
 *
 * This implementation mixes html and php code to enter data
 * It's a simple implementation but it works
 *
 */
?>
    <div class="container top25">
        <div class="col-md-6">
            <section class="content">
                <?php
                // Loop through the posts and display them
                while ($post = $posts->fetch()) {
                    // Call the method to create the layout for a post
                    News::story($post);
                }
                ?>
            </section>
        </div>
        <?php
        /**
         *
         * This implementation abstracts out the table creation
         *
         * The implementation is a bit more complicated but notice how simple it is
         * to render the table on your page.  This is the preferred way to do it.
         *
         */
        ?>
        <div class="col-md-6">
            <section class="content">
                <h1>Pages List - Abstracted</h1>
                <p>This imeplementation builds full table from the results set. This implementation is better
                    because there is no mixture of HTML on the page. The method merges the data</p>
                <?php
                $table = Layout::buildTable($res->fetchAll());
                echo $table;
                ?>
            </section>
        </div>
    </div>

<?php


// Generate the page footer
Layout::pageBottom();