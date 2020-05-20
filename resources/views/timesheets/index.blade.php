<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.min.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js">
    </script>
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
        <div class="container">
            <nav class="nav">
                <li class="nav-item">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="holiday">
                          <label class="custom-control-label" for="holiday">Holiday</label>
                        </div>
                    </div>
                </li>
                <li class="nav-item mx-auto">
                    <div class="form-group">
                        <label>Current Day</label>
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="current-day">
                    </div>
                </li>
                <li class="nav-item">
                    <div class="form-group">
                        <label>BaseSalary</label>
                        <select id="baseSalary" class="form-control" onchange="Ts.updateBaseSalary(this.value)"></select>
                    </div>
                </li>
            </nav>
        </div>
        <table id="bang-chamcong" class="table table-striped mt-2">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Work Shift</th>
                    <th>Salary</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="them-mota" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body w-100">
                    <div class="form-group">
                        <label>Add new Description</label>
                        <textarea class="form-control" id="mota-chitiet"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-25 float-right" id="luu-them-mota">Save</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/timesheets.js"></script>

</html>