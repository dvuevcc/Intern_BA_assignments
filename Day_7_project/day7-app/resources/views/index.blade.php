<!DOCTYPE html>
<html>

<head>
    <title>Laravel Datatables Yajra Server Side</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Laravel Datatables Yajra Server Side</h3>
        <br />
        <div align="right">
            <button type="button" name="add" id="add_data" class="btn btn-success"> <i class="bi bi-plus-square"></i> Add</button>
        </div>
        <br />
        <table id="user_data" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>
                        <button id="generate_pdf" class="btn btn-primary">Generate PDF</button>
                    </th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#user_data').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getdata') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'user_email',
                        name: 'user_email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                ]
            });
        });
    </script>
    <script>
        $('#generate_pdf').on('click', function() {
            $.ajax({
                url: '/generate-pdf',
                method: 'GET',
                success: function(response) {
                    // Open the generated PDF in a new tab
                    window.open('/storage/' + response.filename, '_blank');
                }
            });
        });
    </script>


</body>

</html>