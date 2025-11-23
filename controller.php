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
        global $db;
        
        $limit = 10;
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



    function cari(){
        $req = $_POST;
        $cari = '%' . $req['cari'] . '%';
        global $db;

        $query = "SELECT * FROM books WHERE 
            judulBuku LIKE ? ||
            penerbit LIKE ? ||
            tahunTerbit LIKE ? ||
            rating LIKE ?
        ";
        $prepQuery = $db->prepare($query);
        $prepQuery->bind_param('ssss', $cari, $cari, $cari, $cari);
        $prepQuery->execute();
        $result = $prepQuery->get_result();
        if($result->num_rows == 0){
            $cari = $req['cari'];
            header("Location: index.php?error=Data tidak ditemukan&cari=$cari");
            exit;
        }
        $rows = [];
        while($row = $result->fetch_assoc()){
            $row += ['key' => $req['cari']]; 
            $rows[] = $row;   
        }

        foreach($rows as $key => $value){
            $rows[$key] += ['halamanPaginasi' => 1];
            $rows[$key] += ['halamanAktif' => 1];
        }

        return $rows;
    }




    function tambah(){
        global $db;
        $judulBuku = htmlspecialchars($_POST['judulBuku']);
        $penerbit = htmlspecialchars($_POST['penerbit']);
        $tahunTerbit = htmlspecialchars($_POST['tahunTerbit']);
        $jumlahHalaman = htmlspecialchars($_POST['jumlahHalaman']);
        $rating = htmlspecialchars($_POST['rating']);

        $query = "INSERT INTO books VALUES(
            '', ?, ?, ?, ?, ?
        )";

        $prepQuery = $db->prepare($query);
        $prepQuery->bind_param('sssss', $judulBuku, $penerbit, $tahunTerbit, $jumlahHalaman, $rating);
        $prepQuery->execute();
        $result = mysqli_affected_rows($db);
        if($result > 0){
            header("Location: index.php?message=Data berhasil ditambah!");
            exit;
        }else{
            header("Location: index.php?error=Data gagal ditambah!");
            exit;
        }
    }

?>