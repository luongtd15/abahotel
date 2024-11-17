<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm phòng</title>
</head>
<body>
    <h1>Tìm kiếm phòng</h1>
    <form action="search_rooms.php" method="GET">
        <label for="roomType">Loại phòng:</label>
        <select id="roomType" name="roomType">
            <option value="single">Phòng đơn</option>
            <option value="double">Phòng đôi</option>
            <option value="suite">Phòng suite</option>
        </select>


        <button type="submit">Tìm kiếm</button>
    </form>
</body>
</html>
