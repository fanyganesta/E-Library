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
        $limit = 10;
        global $db;

        if(!isset($_GET['halaman']) || $_GET['halaman'] < 0){
            $halamanAktif = 1;
        } else {
            $halamanAktif = $_GET['halaman'];
        }

        $index = $halamanAktif * $limit - $limit;
        $allData = mysqli_query($db, "SELECT * FROM books");
        $jumlahData = mysqli_num_rows($allData);
        $halamanPaginasi = ceil($jumlahData / $limit);
        $query = "SELECT * FROM books LIMIT $index, $limit";
        $qResult = query($query);

        foreach($qResult as $key => $row){
            $qResult[$key] +=  ['halamanPaginasi' => $halamanPaginasi];
            $qResult[$key] += ['halamanAktif' => $halamanAktif];
        }
        return $qResult;
    }





?>