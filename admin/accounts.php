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
                    <h1 class="display-4 font-weight-bold">Accounts</h1>
                    <hr class="my-4">
                    <div class="bg-light rounded text-center mb-4">
                        <div class="container">
                            <h1 class="display-6">Total Accounts</h1>
                            <h1 class="display-6 text-primary">
                            <?php
                                //get total number of users
                                $query = 'SELECT * FROM users';
                                $result = mysqli_query($conn, $query);
                                $num_of_users = mysqli_num_rows($result);
                                echo $num_of_users;
                            ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-bordered border-dark table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //retrieve results and display them
                        $query2 = "SELECT * FROM users LIMIT " . $starting_limit_number . ',' . $results_per_page;
                        $result2 = mysqli_query($conn, $query2);

                        if(mysqli_num_rows($result2) > 0){
                            while($row = mysqli_fetch_assoc($result2)){
                                echo '
                                <tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['username'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['password'] . '</td>
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
                <a class="page-link" href="../admin/accounts.php?page='.$page.'">' . $page . '</a></li>';
            }
            echo '</ul>';
            ?>
        </div>
    </div>
<?php 
require_once('../config/adminFooter.php');
mysqli_close($conn);
?>