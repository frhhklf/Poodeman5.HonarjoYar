<?php



if (isset($_POST['stdCode'])  && !empty($_POST['stdCode']) && 
	isset($_POST['stdName']) && !empty($_POST['stdName']) && 
	isset($_POST['stdFamily']) && !empty($_POST['stdFamily']) &&
    isset($_POST['stdCity']) && !empty($_POST['stdCity']) &&
	isset($_POST['password']) && !empty($_POST['password'])&&
	isset($_POST['repassword']) && !empty($_POST['repassword'])
	) {

    $stdCode = $_POST['stdCode'];
    $stdName = $_POST['stdName'];
    $stdFamily = $_POST['stdFamily'];
    $stdCity = $_POST['stdCity'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $stdImage = basename($_FILES["stdImage"]["name"]);
} else
    exit("برخی از فیلد ها مقدار دهی نشده است");

$link = mysqli_connect("localhost", "root","", "school");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

    if ($password != $repassword)
    exit("كلمه عبور و تكرار آن مشابه نيست");


    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["stdImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    
    
    $Check = getimagesize($_FILES["stdImage"]["tmp_name"]);
    if ($Check !== false) {
        echo "پرونده انتخابی از نوع  " . $Check["mime"] . " است  <br />";
        $uploadOk = 1;
    } else {
        echo "پرونده انتخاب شده تصویر نیست  <br />";
        $uploadOk = 0;
    }
    
    
    if (file_exists($target_file)) {
        echo "فایلی با همین نام در سرویس دهنده میزبان وجود دارد  <br />";
        $uploadOk = 0;
    }
    
    if ($_FILES["stdImage"]["size"] > 10000000) {
        echo "اندازه فایل انتخابی بیشتر از 10 مگابایت است <br />";
        $uploadOk = 0;
    }
    
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg") {
        echo "فقط پسوندهای JPG, JPEG, PNG برای فایل عکس مجاز هستند  <br />";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "فایل انتخاب شده ارسال نشد <br />";
    } else {
        if (move_uploaded_file($_FILES["stdImage"]["tmp_name"], $target_file)) {
            echo "پرونده " . basename($_FILES["stdImage"]["name"]) .
                " با موفقیت انتقال یافت  <br />";
        } else {
            echo "خطا: در ارسال پرونده به سرویس دهنده میزبان خطایی رخ داد <br />";
        }
    }

$query = "INSERT INTO student (stdCode,stdName,stdFamily,stdCity,password,stdImage) VALUES ('$stdCode','$stdName','$stdFamily','$stdCity','$password','$stdImage')";

if (mysqli_query($link, $query) === true)
    echo ("<p style='color:pink;'><b>" . $stdName .  $stdFamily.
        " گرامي عضویت شما" .
        " با موفقيت انجام شد " . "</b></p>");
else
    echo ("<p style='color:blue;'><b>عضويت شما انجام نشد</b></p>");

mysqli_close($link);

?>