<?php
if (isset($_POST['AksiSubmit'])) {
    $datas = $_POST['datas'];
    $total_nilai = $_POST['total'];
    $data_ex = explode(",", $datas);

    $data_soal = "";
    $pertanyaan = [];
    $no = 0;
    foreach ($data_ex as $key => $val) {
        $pertanyaan[$key] = $val;
        $no++;
        $data_soal .= "<tr>
                        <td> &nbsp; Pertanyaan " . $no . " &nbsp; </td>            
                        <td> &nbsp; " . $val . " &nbsp; </td>            
                    </tr>";
    }

    $jml_pertanyaan = count($data_ex);
    $hasil = array();

    for ($i = 0; $i < pow(2, $jml_pertanyaan); $i++) {
        $temp = array();
        $total = 0;
        for ($j = 0; $j < $jml_pertanyaan; $j++) {
            if ($i & pow(2, $j)) {
                $temp[$j] = $pertanyaan[$j];
                $total += $pertanyaan[$j];
            }
        }
        if ($total == $total_nilai) {
            $hasil[] = $temp;
        }
    }

    echo '<br>=================================================================================<br>';
    echo '<b>SOAL</b><br>';
    echo '<table border=1>
        <thead>
            <tr>
                <td>Soal</td>
                <td>Nilai</td>
            </tr>
        </thead>
        <tbody>
            ' . $data_soal . '
        </tbody>
    </table>';
    echo '<br>dengan Nilai Total Soal (T) = ' . $total_nilai;
    echo '<br><br> <b>JAWABAN</b> <br>';
    echo 'Jumlah semua Kombinasi (K) = ' . count($hasil);

    if (count($hasil) > 0) {
        echo '<br><br>Daftar Kombinasi:<br>';
        foreach ($hasil as $key => $val) {
            $no = $key + 1;
            echo '<br>Kombinasi ' . $no . '<br>';
            $table_kombinasi = '';
            foreach ($val as $keys => $vals) {
                $no = $keys + 1;
                $table_kombinasi .= "<tr>
                            <td> &nbsp; Pertanyaan " . $no . " &nbsp; </td>            
                            <td> &nbsp; " . $vals . " &nbsp; </td>            
                        </tr>";
            }
            echo '<table border=1>
                    <thead>
                        <tr>
                            <td>Soal</td>
                            <td>Nilai</td>
                        </tr>
                    </thead>
                    <tbody>
                        ' . $table_kombinasi . '
                    </tbody>
                </table>';
        }
    } else {
        echo '<br><br>Tidak ada Kombinasi<br>';
    }
}
