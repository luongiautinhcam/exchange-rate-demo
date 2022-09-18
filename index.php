<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tỷ giá ngoại tệ - VCB</title>
</head>

<body>
    <h3>TỶ GIÁ Vietcombank</h3>
    <table border="1">
        <tr>
            <td>Mã</td>
            <td>Tên</td>
            <td>Mua</td>
            <td>Bán</td>

        </tr>

        <?php
        $url = "https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx";
        $xml = file_get_contents($url);
        $data = simplexml_load_string($xml);
        //print_r($data);

        $time = $data->DateTime;
        $ty_gia = $data->Exrate;
        $timeupdate = date_format(date_create($time),'d-m-Y H:i:s');
        foreach ($ty_gia as $nt) {
        ?>
            <tr>
                <td>
                    <?php echo $ma = $nt['CurrencyCode']; ?>
                </td>
                <td>
                    <?php echo $ten = $nt['CurrencyName']; ?>
                </td>
                <td>
                    <?php echo $mua = $nt['Buy']; ?>
                </td>
                <td>
                <?php echo $ban = $nt['Sell']; ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <hr>
    Tỷ giá cập nhật vào lúc <b><?php echo $timeupdate?></b> và chỉ mang tính chất tham khảo<br>
    * <i>Đơn vị <b>VNĐ</b> </i> 
</body>

</html>
