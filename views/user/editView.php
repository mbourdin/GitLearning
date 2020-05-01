<form method="post">
    <table class="table" >
        <tr>
            <td>id</td>
            <td>username</td>
            <td>email</td>
        </tr>
        <tr>
            <td><input type="text" disabled value="<?= $user["id"] ?>" name="id"></td>
            <td><input type="text"  value="<?= $user["username"] ?>" name="username"></td>
            <td><input type="text" value="<?= $user["email"]?>" name="email"></td>
        </tr>
        <tr><td colspan="5"><input type="submit" value="mettre a jour"></td></tr>
    </table>
</form>