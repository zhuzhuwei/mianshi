<?php

/**
 * 读取excel数据返回数组
 *
 * @param type $file
 * @return type
 *
 */
function excel_to_array($file){
    require_once APPPATH . 'third_party/phpExcel/PHPExcel.php';

    $info = pathinfo($file);
    if($info['extension'] == 'xlsx'){
        $type = 'Excel2007';
    }elseif($info['extension'] == 'xls'){
        $type = 'Excel5';
    }

    $objReader = PHPExcel_IOFactory::createReader($type);
    $objReader->setReadDataOnly(true);
    $objPHPExcel = $objReader->load($file);
    $objWorksheet = $objPHPExcel->getActiveSheet();
    $highestRow = $objWorksheet->getHighestRow();
    $highestColumn = $objWorksheet->getHighestColumn();
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $excelData = array();
    for ($row = 2; $row <= $highestRow; ++$row) {
        for ($col = 0; $col < $highestColumnIndex; ++$col) {
            $excelData[$row][] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
        }
    }
    return $excelData;
}

function excel_api($data){
    $url = REGISTER_API;
    $ci = & get_instance();
    $ci->load->helper('string');
    $random_string = random_string('alnum', 10);
    $secret = array(
        'random_string' => $random_string,
        'secret_string' => md5(md5($random_string) . API_SECRET_STRING_FOR_FRM)
    );

    $data = array_merge($data, $secret);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, TRUE);
}