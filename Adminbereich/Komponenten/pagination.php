<?php
    class a_pagination {

        public static function paginationF() {
            global $conn;
            try {

                // Find out how many items are in the table
                $total = $conn->query('
                    SELECT
                        COUNT(*)
                    FROM
                        nutzer
                    WHERE
                        n_admin = 0    
                ')->fetchColumn();
            
                // How many items to list per page
                $limit = 5;
            
                // How many pages will there be
                $pages = ceil($total / $limit);
            
                // What page are we currently on?
                $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                    'options' => array(
                        'default'   => 1,
                        'min_range' => 1,
                    ),
                )));
            
                // Calculate the offset for the query
                $offset = ($page - 1)  * $limit;
            
                // Some information to display to the user
                $start = $offset + 1;
                $end = min(($offset + $limit), $total);
            

                // Prepare the paged query
                $stmtp = $conn->prepare('
                    SELECT
                        *
                    FROM
                        nutzer
                    WHERE
                        n_admin = 0    
                    ORDER BY
                        n_nname
                    LIMIT
                        :limit
                    OFFSET
                        :offset
                ');
            
                // Bind the query params
                $stmtp->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmtp->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmtp->execute();
            
                // Do we have any results?
                if ($stmtp->rowCount() > 0) {
                    // Define how we want to fetch the results
                    $stmtp->setFetchMode(PDO::FETCH_ASSOC);
                    $iterator = new IteratorIterator($stmtp);
            
                    // Display the results
                    foreach ($iterator as $row) {
                        //echo '<p>', $row['n_nname'], '</p>';


                    print"<div  class=\"admin-box-linie\"> 
                        <div  class=\"admin-box-liste\"> 

                
                            <div  class=\"admin-box-liste-kdnr\"> 
                            Kd-Nr ".$row['n_id']."
                            </div>
                            <div  class=\"admin-box-liste-name\"> 
                            ".$row['n_vname']." ".$row['n_nname']."
                            </div>
                            <div  class=\"admin-box-liste-gesperrt\">";

                            if ($row['n_sperre'] == 1){
                            print "gesperrt";
                            } 
                            print" </div>
                            <div  class=\"admin-box-liste-ansehen\">
                            <form method=\"POST\" action=\"http://localhost/b5ba/index.php?Seiten_ID=admin-user-anzeigen&adminnutzerwahl=".$row['n_id']."\">
                                <input type=\"submit\"  class=\"a-button\" value=\"ansehen\">
                                </form>
                            </div>
    
                     </div>
                 </div>";
                    }
            
                } else {
                    echo '<p>No results could be displayed.</p>';
                }
            
            } catch (Exception $e) {
                echo '<p>', $e->getMessage(), '</p>';
            }

            echo"<div class =\"paginationSatz\">";
            // The "back" link
            $prevlink = ($page > 1) ? '<a href="http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste&page=1" title="First page">&laquo;</a> <a href="http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste&page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
            
            // The "forward" link
            $nextlink = ($page < $pages) ? '<a href="http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste&page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="http://localhost/b5ba/index.php?Seiten_ID=admin-user-kundenliste&page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
            
            // Display the paging information
            echo '<div id="paging"><p>', $prevlink, ' Seite ', $page, ' von ', $pages, ' Seiten, ', $start, '-', $end, ' von ', $total, ' Resultaten ', $nextlink, ' </p></div>';

            echo"</div>";
        }
    }

?>