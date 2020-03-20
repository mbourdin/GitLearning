
<main class="container">
    <h1 class="m-4">Créer un utilisateur</h1>
    <form method="post" action="../pages/userCreate.php" id="createUserForm">
    <table class="table table-bordered table-responsive ml-4 border-0">
        <thead class="text-center">
        <tr class="bg-info text-white">
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
    <h1 class="m-4">Liste des utilisateurs</h1>
    <table class="table table-bordered table-responsive ml-4 border-0" id="dataTable">

        <thead><tr class="bg-info text-white">
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
                    <a href="userDelete.php?id='.$user["id"].'"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                    <a href="userEdit.php?id='.$user["id"].'"><i class="fas fa-edit text-success m-2"></i></a>
                </td>
            </tr>';
        }
    
        ?>
        </tbody>
    </table>
</main>
