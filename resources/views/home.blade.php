@extends('layouts.app')

<?php
    $servername = "vietnamese-dictionary.clgtn4sxu21h.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "WebIT4552";
    $dbname = "vietdict";
     
    // tạo connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // kiểm connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
     
    $sql = "SELECT entry FROM entries";
    $result = $conn->query($sql);
     
    if ($result->num_rows > 0) {
        // output dữ liệu trên trang
        $entries = array();

        while($row = $result->fetch_assoc()) {
            $entries[] = $row['entry'];
        }
    }

    $conn->close();
?>

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <img src="images/logo.png" class='logo' alt="" />
    </div>
    <div class="row justify-content-center">
        <form class="form-inline input-group col-md-8" method="POST" action="{{ route('entry.post') }}">
            @csrf
            <input class="form-control form-control-lg border-dark bg-light rounded-left col-10" type="text" name="q" placeholder="Tìm từ" aria-label="Search" id="suggesstion-box">
            
            <script>
                $( "#suggesstion-box" ).autocomplete({
                  source: <?php echo json_encode($entries) ?>
                });
            </script>

            <div class="input-group-btn input-group-append col-2 px-0">
                <button class="btn btn-lg btn-dark w-100 rounded-right" type="submit">Tìm</button>
            </div>
        </form>
    </div>
</div>
@endsection