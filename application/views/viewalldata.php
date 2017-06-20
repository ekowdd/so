<?php

foreach ($query as $row) {
    $data = array(
        'product_code' => $row->product_code,
        'product_name' => $row->product_name,
        'barcode' => $row->barcode,
        'store_name' => $row->store_name,
        'quantity' => $row->quantity,
        'value' => $row->value,
        'total' => $row->total,
        'nama_file' => $row->nama_file,
        'type' => $row->type,
        'image' => base_url() . 'assets/hasil_resize/' . $row->nama_file
    );
    echo json_encode(array('msg'=>$data));
}
