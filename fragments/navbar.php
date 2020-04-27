<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="userList.php">User list</a>
            </li>

            <?php
            if (isset($_SESSION["user"])) {
                echo("<li class='nav-item'>connecte en tant que "
                    . $_SESSION["user"]->username . "<br /><a class='nav-link text-center' href='logout.php'>logout</a></li>");


            } else {
                echo '<li>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#loginModal">login</button>
              
            </li>';

            }

            ?>
        </ul>
    </div>
</nav>
<!-- login Modal -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!--            <div class="modal-header">-->
            <!--                <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--                <h4 class="modal-title">Modal Header</h4>-->
            <!--            </div>-->
            <div class="modal-body">
                <form action="login.php" method=post>
                    <label for="usernameLoginInput">username</label>
                    <input type="text" name="username" id="usernameLoginInput">
                    <br>
                    <label for="passwordLoginInput">password</label>
                    <input type="password" name="password" id="passwordLoginInput">
                    <br>
                    <input type="submit" value="log in" class="btn btn-outline-success">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
