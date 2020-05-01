function addNewUser(result)
{

    let user=JSON.parse(result);
    console.log(user);
    let table=document.getElementById("dataTable");
    let newline=table.insertRow(-1);
    newline.id=user.id;
    newline.innerHTML="<td>"+user.id+"</td>" +
        "<td>"+user.username+"</td>" +
        "<td>"+user.email+"</td>" +
        "<td>"+user.privileges+"</td>"+
        '<td>' +
        '<a class="btn btn-danger deleteLink" id="deletebutton'+user.id+'" href="delete?id='+user.id+'">DELETE</a> '+
        '<a class="btn btn-primary editLink"  id="editbutton'+user.id+'" href="edit?id='+user.id+'">EDIT</a>' +
        '</td>';
        $("#deletebutton"+user.id).click(
            setupDelete
        )
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
});
function setupDelete(event)
{
        event.preventDefault();
        let href=event.currentTarget.href;
        $.ajax({
            url: href,
            type: "delete",
            success: function (result) {
                let element=document.getElementById(JSON.parse(result).id);
                console.log(element);
                element.remove();
            }
        })

}
$(".deleteLink").click(
    setupDelete
);
