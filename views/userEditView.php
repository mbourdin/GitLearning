<form method="post" action="../pages/userEdit.php?id=<?php echo $user["id"]?>">
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>username</th>
            <th>email</th>
            <th>valider</th>
        </tr>
        <tr>
            <td>
                <input type="text" name="username" value="<?php echo $user["username"]?>">
            </td>
            <td>
                <input type="email" name="email" value="<?php echo $user["email"]?>">
            </td>
            <td>
                <input type="submit" class="btn btn-success" value="creer">
            </td>
        </tr>
        </thead>
    </table>
</form>