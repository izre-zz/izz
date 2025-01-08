<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// إدخال بيانات إلى الجدول
$sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com')";
if ($conn->query($sql) === TRUE) {
    echo "تمت إضافة البيانات بنجاح";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

// استرجاع البيانات من الجدول
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - الاسم: " . $row["name"]. " - البريد الإلكتروني: " . $row["email"]. "<br>";
    }
} else {
    echo "لا توجد بيانات";
}

$conn->close();
?>