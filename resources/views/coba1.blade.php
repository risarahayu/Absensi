<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
</head>

<body>
    <form class="form-inline row">
        <div class="form-group col-sm-6">
            <label for="datepicker" class="col-sm-4">Bootstrap-datepicker</label>
            <input type="text" class="form-control col-sm-8" id="datepicker" placeholder="Select a Date" readonly>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#datepicker').datepicker({
                        format: 'mm-dd-yyyy'
                    });
                });
            </script>
        </div>
    </form>
</body>

</html>