$(document).ready(function(){

    let origin = window.location.origin;
    let path = window.location.pathname.split( '/' );
    let URL = origin+'/'+path[1]+'/';
    
    // check user login
    // =======================
    $('#adminLogin').submit(function(e){
        e.preventDefault();
        let username = $('.username').val();
        let password = $('.password').val();
        if(username == '' || password == ''){
            $('#adminLogin').append('<div class="alert alert-danger">Please Fill All The Fields.</div>');
        }else{
            $.ajax({
                url    : "./php_files/check_login.php",
                type   : "POST",
                data   : {login:'1',name:username,pass:password},
                success: function(response){
                    $('.alert').hide();
                    let res = JSON.parse(response);
                    if(res.hasOwnProperty('success')){
                        $('#adminLogin').append('<div class="alert alert-success">Logged In Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/dashboard.php'; }, 1000);
                    }else if(res.hasOwnProperty('error')){
                        $('#adminLogin').append('<div class="alert alert-danger">Username and Password not Matched.</div>');
                    }
                }
            });
        }
    });

    $('#changePassword').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        let oldPass = $('.old_pass').val();
        let newPass = $('.new_pass').val();
        // if(oldPass == '' || newPass == ''){
        //     $('#changePassword').prepend('<div class="alert alert-danger">Please Fill All The Fields.</div>');
        // }else{
            let formdata = new FormData(this);
            formdata.append('changePass','1')
            $.ajax({
                url    : "./php_files/check_login.php",
                type   : "POST",
                contentType: false,
                processData: false,
                data   : formdata,
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = JSON.parse(response);

                    if(res.hasOwnProperty('success')){
                        $('#changePassword').prepend('<div class="alert alert-success">Password Changed Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/dashboard.php'; }, 1000);
                    }else if(res.hasOwnProperty('error')){
                        $('#changePassword').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            });
        //}
    });


    // show sub categories
    $('.product_category').change(function(){
        let id = $('.product_category option:selected').val();
        $.ajax({
            url    : "./php_files/products.php",
            type   : "POST",
            data   : {p_cat:id},
            success: function(response){
                let res = JSON.parse(response);
                if(res.hasOwnProperty('sub_category')){
                    let sub_cat = '<option value="" selected disabled>Select Sub Category</option>';
                    let sub_cat_length = res.sub_category.length;
                    for(let i = 0;i<sub_cat_length;i++){
                        sub_cat += '<option value="'+res.sub_category[i].sub_cat_id+'">'+res.sub_category[i].sub_cat_title+'</option>';
                    }
                    $('.product_sub_category').html(sub_cat);
                }
                if(res.hasOwnProperty('brands')){
                    let brand = '<option value="" selected disabled>Select Brand</option>';
                    let brand_length = res.brands.length;
                    if(brand_length > 0){
                        for(let j = 0;j<brand_length;j++){
                            brand += '<option value="'+res.brands[j].brand_id+'">'+res.brands[j].brand_title+'</option>';
                        }
                    }else{
                        brand = '<option value="" selected disabled>No Brands Found</option>';
                    }
                    
                    $('.product_brands').html(brand);
                }
            }
        });
    });

    // load product image with jquery
    $('.product_image').change(function(){
        readURL(this);
    })

    // add product
    $('#createProduct').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        let title = $('.product_title').val();
        let cat = $('.product_category option:selected').val();
        let sub_cat = $('.product_sub_category option:selected').val();
        let des = $('.product_description').val();
        let price = $('.product_price').val();
        let qty = $('.product_qty').val();
        let status = $('.product_status').val();
        let image = $('.product_image').val();
        if(title == ''){
            $('#createProduct').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        }else if(cat == ''){
            $('#createProduct').prepend('<div class="alert alert-danger">Category Field is Empty.</div>');
        }else if(sub_cat == ''){
            $('#createProduct').prepend('<div class="alert alert-danger">Sub Category Field is Empty.</div>');
        }else if(des == ''){
            $('#createProduct').prepend('<div class="alert alert-danger">Description Field is Empty.</div>');
        }else if(price == ''){
            $('#createProduct').prepend('<div class="alert alert-danger">Price Field is Empty.</div>');
        }else if(qty == ''){
            $('#createProduct').prepend('<div class="alert alert-danger">Quantity Field is Empty.</div>');
        }else if(image == ''){
            $('#createProduct').prepend('<div class="alert alert-danger">Image Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('create',1);
            $.ajax({
                url    : "./php_files/products.php",
                type   : "POST",
                data   : formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#createProduct').prepend('<div class="alert alert-success">Product Added Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/products.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#createProduct').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            });
        }

    });

    // update product
    $('#updateProduct').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        // let title = $('.product_title').val();
        // let cat = $('.product_category option:selected').val();
        // let sub_cat = $('.product_sub_category option:selected').val();
        // let des = $('.product_description').val();
        // let price = $('.product_price').val();
        // let qty = $('.product_qty').val();
        // let status = $('.product_status').val();
        // let image = $('.product_image').val();
        // let old_image = $('.old_image').val();
        // if(title == ''){
        //     $('#updateProduct').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        // }else if(cat == ''){
        //     $('#updateProduct').prepend('<div class="alert alert-danger">Category Field is Empty.</div>');
        // }else if(sub_cat == ''){
        //     $('#updateProduct').prepend('<div class="alert alert-danger">Sub Category Field is Empty.</div>');
        // }else if(des == ''){
        //     $('#updateProduct').prepend('<div class="alert alert-danger">Description Field is Empty.</div>');
        // }else if(price == ''){
        //     $('#updateProduct').prepend('<div class="alert alert-danger">Price Field is Empty.</div>');
        // }else if(qty == ''){
        //     $('#updateProduct').prepend('<div class="alert alert-danger">Quantity Field is Empty.</div>');
        // }else if(image == '' && old_image == ''){
        //     $('#updateProduct').prepend('<div class="alert alert-danger">Image Field is Empty.</div>');
        // }else{
            let formdata = new FormData(this);
            formdata.append('update',1);
            $.ajax({
                url    : "./php_files/products.php",
                type   : "POST",
                data   : formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#updateProduct').prepend('<div class="alert alert-success">Product Added Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/products.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#updateProduct').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            });
      //  }

    });


    // delete product
    $('.delete_product').click(function(){
        let tr = $(this);
        let id = $(this).attr('data-id');
        let sub_cat = $(this).attr('data-subcat');
        if(confirm('Are you Sure want to delete this')){
            $.ajax({
                url: './php_files/products.php',
                type: 'POST',
                data: {delete_id:id,p_subcat:sub_cat},
                dataType: 'json',
                success: function(response){
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        tr.parent().parent('tr').remove();
                        
                    }else if(res.hasOwnProperty('error')){
                        // $('#updateProduct').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            });
        }
    });

    // add category
    $('#createCategory').submit(function(e){
        e.preventDefault();
        let cat = $('.category').val();
        if(cat == ''){
            $('#createCategory').prepend('<div class="alert alert-danger">Category Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('create','1');
            $.ajax({
                url: './php_files/category.php',
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#createCategory').prepend('<div class="alert alert-success">Category Added Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/category.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#createCategory').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            })
        }
    });

    // update category
    $('#updateCategory').submit(function(e){
        e.preventDefault();
        let cat = $('.cat_name').val();
        if(cat == ''){
            $('#updateCategory').prepend('<div class="alert alert-danger">Category Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('update','1');
            $.ajax({
                url: './php_files/category.php',
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#updateCategory').prepend('<div class="alert alert-success">Category Modified Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/category.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#updateCategory').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            })
        }
    });

    // delete category
    $('.delete_category').click(function(){
        let tr = $(this);
        let id = $(this).attr('data-id');
        if(confirm('Are you Sure want to delete this')){
            $.ajax({
                url: './php_files/category.php',
                type: 'POST',
                data: {delete_id:id},
                dataType: 'json',
                success: function(response){
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        tr.parent().parent('tr').remove();
                    }
                }
            });
        }
    });



    // add sub category
    $('#createSubCategory').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        let title = $('.sub_category').val();
        let parent = $('.parent_cat option:selected').val();
        if(title == ''){
            $('#createSubCategory').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        }else if(parent == ''){
            $('#createSubCategory').prepend('<div class="alert alert-danger">Parent Category Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('create','1');
            $.ajax({
                url: './php_files/sub_category.php',
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#createSubCategory').prepend('<div class="alert alert-success">Sub Category Added Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/sub_category.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#createSubCategory').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            })
        }
    });

    // update sub category
    $('#updateSubCategory').submit(function(e){
        e.preventDefault();
        let title = $('.sub_category').val();
        let parent = $('.parent_cat option:selected').val();
        if(title == ''){
            $('#updateSubCategory').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        }else if(parent == ''){
            $('#updateSubCategory').prepend('<div class="alert alert-danger">Parent Category Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('update','1');
            $.ajax({
                url: './php_files/sub_category.php',
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#updateSubCategory').prepend('<div class="alert alert-success">Sub Category Modified Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/sub_category.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#updateSubCategory').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            })
        }
    });

    // delete sub category
    $('.delete_subCategory').click(function(){
        let tr = $(this);
        let id = $(this).attr('data-id');
        if(confirm('Are you Sure want to delete this')){
            $.ajax({
                url: './php_files/sub_category.php',
                type: 'POST',
                data: {delete_id:id},
                dataType: 'json',
                success: function(response){
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        tr.parent().parent('tr').remove();
                    }else if(res.hasOwnProperty('error')){
                        alert("You Don't Delete This");
                    }
                }
            });
        }
    });

    // script for show categories in header

    $('.showCat_Header').click(function(){
        let id = $(this).attr('data-id');
        let status = '';
        if($(this).prop("checked") == true){
            status = '1';
        }else if($(this).prop("checked") == false){
            status = '0';
        }
        $.ajax({
                url: './php_files/sub_category.php',
                type: 'post',
                data: {id:id,showInHeader:status},
                success: function(response){
                }
            })
    });

    // script for show categories in footer

    $('.showCat_Footer').click(function(){
        let id = $(this).attr('data-id');
        let status = '';
        if($(this).prop("checked") == true){
            status = '1';
        }else if($(this).prop("checked") == false){
            status = '0';
        }
        $.ajax({
                url: './php_files/sub_category.php',
                type: 'post',
                data: {id:id,showInFooter:status},
                success: function(response){
                    // console.log(response);
                }
            })
    });

    // add brand
    $('#createBrand').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        let title = $('.brand_name').val();
        let parent = $('.brand_category option:selected').val();
        if(title == ''){
            $('#createBrand').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        }else if(parent == ''){
            $('#createBrand').prepend('<div class="alert alert-danger">Parent Category Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('create','1');
            $.ajax({
                url: './php_files/brands.php',
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#createBrand').prepend('<div class="alert alert-success">Brand Added Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/brands.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#createBrand').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            })
        }
    });

    // update brand
    $('#updateBrand').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        let title = $('.brand_name').val();
        let parent = $('.brand_category option:selected').val();
        if(title == ''){
            $('#updateBrand').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        }else if(parent == ''){
            $('#updateBrand').prepend('<div class="alert alert-danger">Parent Category Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('update','1');
            $.ajax({
                url: './php_files/brands.php',
                type: 'post',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#updateBrand').prepend('<div class="alert alert-success">Brand Modified Successfully.</div>');
                        setTimeout(function(){ window.location = URL+'admin/brands.php'; }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#updateBrand').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            })
        }
    });

    // delete_brand
    $('.delete_brand').click(function(){
        let tr = $(this);
        let id = $(this).attr('data-id');
        if(confirm('Are you Sure want to delete this')){
            $.ajax({
                url: './php_files/brands.php',
                type: 'POST',
                data: {delete_id:id},
                dataType: 'json',
                success: function(response){
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        tr.parent().parent('tr').remove();
                    }else if(res.hasOwnProperty('error')){
                        alert("You Don't Delete This");
                    }
                }
            });
        }
    });

    // view user details
    $('.user-view').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: './php_files/users.php',
            method: 'POST',
            data: { user_view:id },
            dataType: 'json',
            success: function (response) {
                 $('.single_record').hide();
                console.log(response);
                let tr = '<table class="single_record table table-bordered">'+
                            '<h3 class="single_record">User Details</h3>'+
                            '<tr>'+
                                '<td>First Name</td>'+
                                '<td>'+response[0].f_name+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Last Name</td>'+
                                '<td>'+response[0].l_name+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Email</td>'+
                                '<td>'+response[0].email+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Mobile</td>'+
                                '<td>'+response[0].mobile+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Address</td>'+
                                '<td>'+response[0].address+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>City</td>'+
                                '<td>'+response[0].city+'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>User Status</td>'+
                                '<td>';
                                    if(response[0].user_role == '1'){
                                        tr += 'Activated';
                                    }else{
                                        tr += 'Blocked';
                                    }
                        tr += '</td>'+
                            '</tr>'+
                        '</table>';
                $('#user-detail .modal-body').append(tr);
                $('#user-detail').modal('show');
            }
        });
    });

    // change user status
    $('.user-status').click(function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let status = $(this).attr('data-status');
        $.ajax({
            url: './php_files/users.php',
            method: 'POST',
            data: { user_id:id,status_id:status },
            success: function (data) {
                location.reload();
            }
        });
    });

    // delete user
    $('.delete_user').click(function(){
        let tr = $(this);
        let id = $(this).attr('data-id');
        if(confirm('Are you Sure want to delete this')){
            $.ajax({
                url: './php_files/users.php',
                type: 'POST',
                data: {delete_id:id},
                dataType: 'json',
                success: function(response){
                    let res = response;
                    console.log(response);
                    if(res.hasOwnProperty('success')){
                        tr.parent().parent('tr').remove();
                    }else if(res.hasOwnProperty('error')){
                        alert("You Don't Delete This");
                    }
                }
            });
        }
    });

    // update site options
    $('#updateOptions').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        let site_name = $('.site_name').val();
        let site_title = $('.site_title').val();
        let old_logo = $('.old_logo').val();
        let new_logo = $('.new_logo').val();
        let footer_text = $('.footer_text').val();
        let currency = $('.currency').val();
        let desc = $('.site_desc').val();
        let phone = $('.phone').val();
        let email = $('.email').val();
        let address = $('.address').val();
        
        if(site_name == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Site Name Field is Empty.</div>');
        }if(site_title == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Site Title Field is Empty.</div>');
        }else if(footer_text == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Footer Text Field is Empty.</div>');
        }else if(currency == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Currency Format Field is Empty.</div>');
        }else if(desc == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Site Description is empty Field is Empty.</div>');
        }else if(phone == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Phone Field is Empty.</div>');
        }else if(email == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Email Field is Empty.</div>');
        }else if(address == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Address Field is Empty.</div>');
        }else{
            let formdata = new FormData(this);
            formdata.append('update',1);
            $.ajax({
                url    : "./php_files/options.php",
                type   : "POST",
                data   : formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    let res = response;
                    if(res.hasOwnProperty('success')){
                        $('#updateOptions').prepend('<div class="alert alert-success">Options Updates Successfully.</div>');
                        setTimeout(function(){ window.location(); }, 1000);
                        
                    }else if(res.hasOwnProperty('error')){
                        $('#updateOptions').prepend('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }
            });
        }

    });

    // load image with jquery
    $('.new_logo').change(function(){
        readURL(this);
    })

    // change order delivery status for complete

    $('.order_complete').click(function(e) {
         e.preventDefault();
         $('.alert').hide();
        let order_id = $(this).attr('data-id');
        $.ajax({
            url: './php_files/orders.php',
            method: 'POST',
            data: { complete: '1', order_id:order_id },
            dataType: 'json',
            success: function (data) {
                $('.alert').hide();
                let res = data;
                console.log(data);
                if(res.hasOwnProperty('error')){
                     $('#error-order-msg').html('<div class="alert alert-danger">'+res.error+'</div>');
                }else{
                    $('.alert').hide();
                    location.reload();
                }
                
            }
        });
    });


     // change order delivery status for cancel
      $('.order_cancle').click(function(e) {
         e.preventDefault();
         $('.alert').hide();
        let order_id = $(this).attr('data-id');
        $.ajax({
            url: './php_files/orders.php',
            method: 'POST',
            data: { cancel: '2', order_id:order_id },
            dataType: 'json',
            success: function (data) {
                $('.alert').hide();
                let res = data;
                console.log(data);
                if(res.hasOwnProperty('success')){
                     $('#error-order-msg').html('<div class="alert alert-danger">'+res.success+'</div>');
                     setTimeout(() => {
                         location.reload();
                     }, 2000);
                }else{
                    $('.alert').hide();
                    location.reload();
                }
                
            }
        });
    });



// preview image before upload
function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function(e) {
      $('#image').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

});

