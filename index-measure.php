<?php
include_once __DIR__."/VSMModule/Preprocessing.php";
include_once __DIR__."/VSMModule/VSM.php";

function pencarian($katakunci)
{
    // == STEP 1 inisialisasi
    $preprocess = new Preprocessing();
    $vsm = new VSM();

    // == STEP 2 mendapatkan kata dasar
    $query = $preprocess::preprocess($katakunci);

    // == STEP 3 medapatkan dokumen ke array
    $connect = mysqli_query(mysqli_connect('localhost', 'root', '', '21_information_retrieval','3306'), "SELECT * FROM tb_uud");
    $arrayDokumen = [];
    while ($row = mysqli_fetch_assoc($connect)) {
        $arrayDoc = [
            'id_doc' => $row['id'],
            'dokumen' => implode(" ", $preprocess::preprocess($row['isi']))
        ];
        array_push($arrayDokumen, $arrayDoc);
    }
    
    // STEP 4 == mendapatkan ranking dengan VSM
    $rank = $vsm::get_rank($query, $arrayDokumen);
    var_dump($rank);
    die();

}

// jalankan fungsi
pencarian('perang krisis era pandemi');
