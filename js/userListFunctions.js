function addNewUser(result)
{

    let user=JSON.parse(result);
    console.log(user);
    let table=document.getElementById("dataTable");
    let newline=table.insertRow(-1);
    newline.innerHTML="<td>"+user.id+"</td>" +
        "<td>"+user.username+"</td>" +
        "<td>"+user.email+"</td>" +
        "<td>"+user.privileges+"</td>"+
        '<td>' +
        '<a class="btn btn-danger" href="userDelete.php?id='+user.id+'">DELETE</a> '+
        '<a class="btn btn-primary" href="userEdit.php?id='+user.id+'">EDIT</a>' +
        '</td>';
}
function addUser()
{
    let form=$("#createUserForm");
    console.log(form[0]);
    $.ajax({
        url: form[0].action,
        type: form[0].method,
        data : form.serialize(),
        success : addNewUser
    })
}
//intercepter le submit et le remplacer par un submit en ajax
$("#createUserForm").submit(function (event) {
    event.preventDefault();
    addUser();

})