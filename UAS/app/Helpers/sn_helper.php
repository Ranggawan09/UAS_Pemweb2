<?php

function tampilan ($halaman, $data=[]){
    echo view('templates/blank', $data);
    echo view($halaman, $data);
    echo view('templates/v_footer', $data);
}
