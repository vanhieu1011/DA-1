<?php
require_once 'pdo.php';


// /**
//  * Thêm loại mới
//  * @param String $ten_loai là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
function danhmuc_insert($ten_danhmuc){
    $sql = "INSERT INTO danhmuc(name) VALUES(?)";
    pdo_execute($sql, $ten_danhmuc);
}

function deldm($id){
    $sql = "DELETE FROM danhmuc WHERE id=".$id;
   if(is_array($id)){
        foreach ($id as $dm) {
            pdo_execute($sql, $dm);
       }
    }
    else{
        pdo_execute($sql, $id);
    }
}
// /**
//  * Cập nhật tên loại
//  * @param int $ma_loai là mã loại cần cập nhật
//  * @param String $ten_loai là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function loai_update($ma_loai, $ten_loai){
//     $sql = "UPDATE danhmuc SET ten_loai=? WHERE ma_loai=?";
//     pdo_execute($sql, $ten_loai, $ma_loai);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_loai là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function loai_delete($ma_loai){
//     $sql = "DELETE FROM danhmuc WHERE ma_loai=?";
//     if(is_array($ma_loai)){
//         foreach ($ma_loai as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_loai);
//     }
// }
// /**
//  * Truy vấn tất cả các loại
//  * @return array mảng loại truy vấn được
//  * @throws PDOException lỗi truy vấn
//  */






function danhmuc_all(){
    $sql = "SELECT * FROM danhmuc ORDER BY id DESC"; //ORDER BY id DESC LÀ DỮ LIỆU MỚI NHẬP LÊN ĐẦU
    return pdo_query($sql);
}


function showdm($dsdm){
    $html_dm='';
    foreach ($dsdm as $dm){
        extract($dm);
        $link='index.php?pg=sanpham$iddm'.$id;
        $html_dm.='<a href="'.$link.'">'.$name.'</a>';
    }
    return $html_dm;
}
function get_name_dm($id){
    $sql = "SELECT name from danhmuc WHERE id=".$id;
    $kq=pdo_query_one($sql);
    return $kq["name"];
}
//admin
function showdm_admin($dsdm,$iddm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        if($id==$iddm){ 
            $se="selected";
        }else{
             $se="";
        }
        $link='index.php?pg=sanpham$iddm'.$id;
        $html_dm.='<option value="'.$id.'" '.$se.' >'.$name.'</option>';
    }
    return $html_dm;
}
function showdm_admin1($dsdm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link='index.php?pg=sanpham$iddm='.$id;
        $html_dm.='<option value="'.$id.'">'.$name.'</option>';
    }
    return $html_dm;
}

function updatedm($id,$name){
    $conn=pdo_get_connection();
    $sql = "UPDATE danhmuc SET name='".$name."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function getonedm($id){
    $conn=pdo_get_connection();
    $stmt =$conn->prepare("SELECT * FROM danhmuc WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}


// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_loai là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_select_by_id($ma_loai){
//     $sql = "SELECT * FROM danhmuc WHERE ma_loai=?";
//     return pdo_query_one($sql, $ma_loai);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_loai là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_exist($ma_loai){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_loai=?";
//     return pdo_query_value($sql, $ma_loai) > 0;
// }