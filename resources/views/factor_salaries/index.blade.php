
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="allfs">
            @include('fs.all')
        </div>
    </div>
    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Title</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Content</p>
                </div>
                <div class="modal-footer">
                    Footer
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('.allfs').load('/factor-salary', function(){
            $('.btn-show').click(function(e){
                e.preventDefault();
                let url = $(this).data('url');
                $.get(url, function(data){

                });
            });

            $('.btn-edit').click(function(e){
                e.preventDefault();
                let data = $(this).parent('form').serialize();
                $.ajax({
                    url: $(this).data('url'),
                    method: 'put',
                    data: data,
                    success: function(data){

                    },
                    error: function(){
                        alert("Ngu. thế mà cũng lỗi");
                    }
                });
            });
        });
    });
</script>
</html>