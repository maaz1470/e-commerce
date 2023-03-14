<?php 
    use App\Backend;
    $app = new Backend();
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Category</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                    <li class="breadcrumb-item active">Add Category</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form action="" method="POST" id="form" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                            <input class="form-control" name="category_name" type="text" id="category_name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10">
                            <select class="form-select" name="category_status" id="category_status">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Category Banner</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control" id="category_image" name="category_image" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Preview</label>
                        <div class="col-md-10">
                            <img id="preview_image" src="" style="display: block; margin: auto; height: 120px; background-size: cover;" />
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Submit</label>
                        <div class="col-md-10">
                            <input id="submit" type="submit" class="btn btn-success btn-xs" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

<script>
    let submit = document.getElementById('submit');
    let category_name = document.getElementById('category_name');
    let description = document.getElementById('description');
    let category_status = document.getElementById('category_status');
    let form = document.getElementById('form');
    let category_image = document.getElementById('category_image');
    let preview = document.getElementById('preview_image');

    const default_image = '<?php $app->asset('/image/preview.png'); ?>';


    preview.src = default_image;

    category_image.addEventListener('change',(e) => {
        preview.src = e.target.files[0] ? URL.createObjectURL(e.target.files[0]) : default_image
    })
    form.addEventListener('submit',function(e){
        e.preventDefault();

        var formData = new FormData(this);
        toastr.options = {
            'postionClass': 'toast-bottom-right',
            'progressBar': true,
            'debug': false
        }
        $.ajax({
            xhr: function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress',function(e){
                    if(e.lengthComputable){
                        var percentComplete = (e.loaded / e.total) * 100;
                        // console.log(percentComplete)
                    }
                });
                return xhr;
            },
            type: 'POST',
            url: location.href,
            contentType: false,
            processData: false,
            data: formData,
            success: function (msg){
                const response = JSON.parse(msg);
                if($.isEmptyObject(response.error)){
                    Swal.fire(
                        'success',
                        response.success,
                        'success'
                    )
                    
                    preview.src = default_image;

                    form.reset()
                }else{
                    toastr.error(response.error)
                }
            },
            error: function(error){
                console.log(error)
            }
        })
    })
    // submit.addEventListener('click',(e) => {
    //     e.preventDefault();
    //     let formData = new FormData(form);
    //     $.ajax({
    //         xhr: function(){
    //             var xhr = new window.XMLHttpRequest();
    //             xhr.upload.addEventListener('progress',function(e){
    //                 if (e.lengthComputable) {
    //                     var percentComplete = (e.loaded / e.total) * 100;
    //                     console.log(e)
    //                 }
    //                 // console.log(e)
                    
    //             },false)
    //             return xhr;
    //         },
    //         type: 'POST',
    //         url: location.href,
    //         data: formData,
    //         // data: {
    //         //     category_name: category_name.value,
    //         //     description: description.value,
    //         //     category_status: category_status.value
    //         // },
    //         success: (response) => {
    //             console.log(response)
    //         },
    //         error: (error) => {
    //             console.log(error)
    //         }
    //     })
    // })
</script>