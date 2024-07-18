

<?php

function cart_insert($idpro, $price, $name, $img, $soluong, $thanhtien, $idbill){
    try {
        $sql = "INSERT INTO cart(idpro, price, name, img, soluong, thanhtien, idbill) VALUES (?, ?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $idpro, $price, $name, $img, $soluong, $thanhtien, $idbill);
    } catch (PDOException $e) {
        // Xử lý ngoại lệ (nếu cần)
        throw $e;
    }
}

    function viewcart(){
        $html_cart='';
        $i=1;
        foreach ($_SESSION['giohang'] as $key => $sp) {
            extract($sp);
            $tt = (int)$price * (int)$soluong;
            $html_cart .= '
            <tr>
                <td>'.$i.'</td>
                <td><img src="./LAYOUT/'.$img.'" width="100"></td>
                <td>'.$name.'</td>
                <td>'.$price.'</td>
                <td>'.$soluong.'</td>
                <td>'.$tt.'</td>
                <td><a href="?action=remove&id='.$key.'">Xóa</a></td>
            </tr>';
            $i++;
        }
        return $html_cart;
    }

    function get_tongdonhang(){
        $tong = 0;
        foreach ($_SESSION['giohang'] as $sp) {
            extract($sp);
            $tt = (int)$price * (int)$soluong;
            $tong += $tt;
        }
        return $tong;
    }

    if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_SESSION['giohang'][$id])) {
            unset($_SESSION['giohang'][$id]);
        }
    }
    
?>
