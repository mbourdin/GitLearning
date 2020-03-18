<h1>creer un utilisateur</h1>
<form method="post" action="../pages/userCreate.php" id="createUserForm">
<table class="table table-bordered table-responsive">
    <thead class="text-center">
    <tr>
        <th><label for="usernameInput">username</label></th>
        <th><label for="emailInput">email</label></th>
        <th><label for="passwordInput">password</label></th>
        <th><label>valider</label></th>
    </tr>
    <tr>
        <td>
            <input type="text" name="username" id="usernameInput">
        </td>
        <td>
            <input type="email" name="email" id="emailInput">
        </td>
        <td>
            <input type="password" name="password" id="passwordInput">
        </td>
        <td>
            <input type="submit" class="btn btn-success" value="creer" id="createUserFormSubmit">
        </td>
    </tr>
    </thead>
</table>
</form>
<h1>Liste des utilisateurs</h1>
<table class="table table-bordered table-responsive" id="dataTable">

    <thead><tr>
        <th>id</th>
        <th>username</th>
        <th>email</th>
        <th>privileges</th>
        <th>boutons</th>
    </tr></thead>
    <tbody>
    <?php

    foreach ($users as $user) {

        echo "<tr>";
        foreach ($user as $key => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo '<td>
                <a class="btn btn-danger" href="userDelete.php?id='.$user["id"].'">DELETE</a>
                <a class="btn btn-primary" href="userEdit.php?id='.$user["id"].'">EDIT</a>
               </td>
        </tr>';
    }
   
    ?>
    </tbody>
</table>
