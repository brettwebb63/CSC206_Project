<?php

// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');

// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');

// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Run a simple query that will be rendered below
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
                <h1>Pages List - Simple</h1>
                <p>This imeplemntation builds only the table contents from the results set.
                It is a mixture of HTML and PHP code so it is a bit messy and not the best implementation.</p>
                <table class="table table-hover">
                   <tr>
                       <th>id</th>
                       <th>name1</th>
                       <th>description1</th>
                       <th>created_at1</th>
                       <th>updated_at1</th>
                   </tr>
<?php
                while ($row = $res->fetch()){
                    echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>' . date('m/d/Y H:i:s', strtotime($row['created_at'])) . '</td>';
                        echo '<td>' . $row['updated_at'] . '</td>';
                    echo '</tr>';
                }
?>
                </table>
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
                    because there is no mixture of HTML on the page.  The method merges the data</p>
<?php
                $table = Layout::buildTable($res->fetchAll());
                echo $table;

                $title = 'Hello Italy';
                $date = 'February 23, 1998';
                $author = 'Fred Flintstone';
                $content = 'This is my long story about blah balhalb a bThis is my long story about blah balhalb a b
                This is my long story about blah balhalb a b
                This is my long story about blah balhalb a b
                This is my long story about blah balhalb a b
                This is my long story about blah balhalb a b
                This is my long story about blah balhalb a b';
                Layout::news($title, $date, $author, $content);


                ?>
            </section>
        </div>
    </div>

<?php


// Generate the page footer
Layout::pageBottom();