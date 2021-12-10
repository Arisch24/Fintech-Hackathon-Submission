<?php 
require_once('../config/adminHeader.php');

//how many results per page
$results_per_page = 10;

//number of results in database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$num_of_results = mysqli_num_rows($result);

//determine total pages available
$number_of_pages = ceil($num_of_results/$results_per_page);

//determine which page number admin is on
if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}
//determine SQL limit
$starting_limit_number = ($page-1) * $results_per_page;
?>
    <!-- Table data -->
    <div class="content" id="content">
        <button class="btn btn-outline-primary my-2" id="sidebarCollapse">Click
        </button>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h1 class="display-4 font-weight-bold">Feedbacks</h1>
                    <hr class="my-4">
                    <div class="bg-light rounded text-center mb-4">
                        <div class="container">
                            <h1 class="display-6">Total Feedbacks</h1>
                            <h1 class="display-6 text-success">
                            <?php
                                //get total number of feedbacks
                                $query = 'SELECT * FROM feedback';
                                $result = mysqli_query($conn, $query);
                                $num_of_feedbacks = mysqli_num_rows($result);
                                echo $num_of_feedbacks;
                            ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered border-dark table-hover">
                    <thead>
                        <tr class="table-success">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM feedback LIMIT " . $starting_limit_number . "," . $results_per_page;
                        $result2 = mysqli_query($conn, $sql2);
                        if(mysqli_num_rows($result2) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['name'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['message'] . '</td>
                                <tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
            //display links to each
            echo '<ul class="pagination pagination-md">';
            for($page=1; $page<=$number_of_pages; $page++){
                echo '
                <li class="page-item">
                <a class="page-link" href="../admin/feedbacks.php?page='.$page.'">' . $page . '</a></li>';
            }
            echo '</ul>';
            ?>
        </div>
    </div>
<?php 
require_once('../config/adminFooter.php');
mysqli_close($conn);
?>