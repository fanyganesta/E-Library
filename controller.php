<?php 
    
    $db = mysqli_connect('localhost', 'root', '', 'e_library');

    function query($request){
        global $db;
        $qResult = mysqli_query($db, $request);
        $rows = [];
        while($fetch = mysqli_fetch_assoc($qResult)){
            $rows[] = $fetch;
        }
        return $rows;
    }

    function index($request = null){
        $query = "SELECT * FROM books";
        $qResult = query($query);
        return $qResult;
    }





?>