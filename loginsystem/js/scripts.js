


// alert ("hii");
// die;
function admin_edit(id) {
    
    var update = id;
    alert (id);
    // die;
    $.ajax({
        
        url: '/loginsystem/admin_edit-profile',
        type: 'POST',
        data: { update },
        success: function(data){
            $('body').html(data);
        },
        error: function(xhr, status, error){
            // Handle the error if the AJAX request fails
            alert("Oops! Something went wrong.");
        }
    });

}
    function admin_delete(id){
        // alert('hi');
         
            var delete_userID = id;
            alert("do you want to delete the record ");
        
            $.ajax({
                url: '/loginsystem/admin_delete-profile',
                type: 'POST',
                data: { delete_userID },
                success:function (data){
                    console.log(data);
                },
                error: function (xhr, status, error){
                    // Handle the error if the AJAX request fails
                    alert("Oops! Something went wrong.");
                }
            });
         
        
        
        // alert("1");

    }
