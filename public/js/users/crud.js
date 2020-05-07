 //Block user
 function block(id) {
     var conf = confirm("Do you want change block column this user?");
     $.ajax({
         url: 'users/block/' + id,
         type: 'get'
     }).done(function() {
         if (conf) {
             toastr.success("Changed column block of this user!");
             reloadTable(); //reload table
         }
     });
 }

 $(document).ready(function() {

     //Show modal edit user by Id
     $('.editModal').click(function() {
         var url = $(this).data('url');
         $.ajax({
             type: 'GET',
             url: url,
             success: function(response) {
                 $(".print-error-msg").css('display', 'none');
                 $('#editModal').find('#id').val(response.id);
                 $('#editModal').find('#username').val(response.username);
                 $('#editModal').find('#email').val(response.email);
             }
         });
     });

     //Edit user
     $(".btn-edit").click(function(e) {
         e.preventDefault();

         var id = $("input[name='id']").val();
         var username = $("input[name='username-edit']").val();
         var email = $("input[name='email-edit']").val();
         var _token = $("meta[name=token]").attr('content');
         $.ajax({
             url: "/users/" + id,
             type: 'PUT',
             data: {
                 _token: _token,
                 username: username,
                 email: email
             },
             success: function(data) {
                 if ($.isEmptyObject(data.error)) {
                     $(".print-error-msg").css('display', 'none');
                     toastr.success(`Updated user ${username}!`);
                     $("#editModal").modal("hide");
                     $('.edit_modal').removeClass('is-invalid').removeClass('is-valid');
                 } else {
                     printErrorMsgEdit(data.error, '-edit');
                 }
             }
         });

         reloadTable(); //Reload table
     });

     //Show modal create
     $(".show-modal-create").click(function(e) {
         $("#createModal").modal("show");
         $('.create_modal').removeClass('is-invalid').removeClass('is-valid');
         $(".print-error-msg").css('display', 'none');
     });

     //Create user
     $(".btn-create").click(function(e) {
         e.preventDefault();

         var username = $("input[name='username-create']").val();
         var email = $("input[name='email-create']").val();
         var password = $("input[name='password-create']").val();
         var password_confirmation = $("input[name='password_confirmation-create']").val();
         var _token = $("meta[name=token]").attr('content');
         $.ajax({
             url: "/users",
             type: 'POST',
             data: {
                 _token: _token,
                 username: username,
                 email: email,
                 password: password,
                 password_confirmation: password_confirmation
             },
             success: function(data) {
                 if ($.isEmptyObject(data.error)) {
                     $(".print-error-msg").css('display', 'none');
                     toastr.success(`Created new user ${username} !`);
                     $("#createModal").modal("hide");
                     $(".reset_form").click();
                     $('.create_modal').removeClass('is-invalid').removeClass('is-valid');
                 } else {
                     printErrorMsgCreate(data.error, '-create');
                 }
             }
         });

         reloadTable();

     });
 });

 function printErrorMsgCreate(msg, text) {
     $(".print-error-msg").find("ul").html('');
     $(".print-error-msg").css('display', 'block');
     $('.create_modal').removeClass('is-invalid').addClass('is-valid');
     $(".passwordConfirm").removeClass('is-valid');
     $.each(msg, function(key, value) {
         $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
         $(`input[name=${key}${text}]`).addClass('is-invalid');
     });
 }

 function printErrorMsgEdit(msg, text) {
     $(".print-error-msg").find("ul").html('');
     $(".print-error-msg").css('display', 'block');
     $('.edit_modal').removeClass('is-invalid').addClass('is-valid');
     $(".passwordConfirm").removeClass('is-valid');
     $.each(msg, function(key, value) {
         $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
         $(`input[name=${key}${text}]`).addClass('is-invalid');
     });
 }

 //Relaod table when change action
 function reloadTable() {
     $.ajax({
         url: "/usersAjax",
         type: 'GET',
     }).done(function(res) {
         $("#reload_table").html(res);

         //Show modal edit user by Id
         $('.editModal').click(function() {
             var url = $(this).data('url');
             $.ajax({
                 type: 'GET',
                 url: url,
                 success: function(response) {
                     $(".print-error-msg").css('display', 'none');
                     $('.edit_modal').removeClass('is-invalid').removeClass('is-valid');
                     $('#editModal').find('#id').val(response.id);
                     $('#editModal').find('#username').val(response.username);
                     $('#editModal').find('#email').val(response.email);
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                     //
                 }
             });
         });
     });
 }