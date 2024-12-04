<?php

class SearchController {
    private $model;


    private $homeQuery;
    
    public function __construct($pdo) {
        $this->model = new SearchModel($pdo);

        $this->homeQuery = new HomeModel();
    }

    // Hiển thị form tìm kiếm
  

    // Xử lý tìm kiếm
    public function search() {
        $query = $_GET['query'] ?? '';  // Từ khóa tìm kiếm
        $category = $_GET['category'] ?? 'all';  // Loại phòng (all, mens, womens, electronics)
        
        // Lấy kết quả tìm kiếm từ model
        $results = $this->model->searchRooms($query, $category);
        $roomType = $this->homeQuery->getRoomTypeForHome();


        // Hiển thị kết quả tìm kiếm
        $view = 'rooms/search';
        include 'client/app/Views/layouts/master.php';
    }
}
?>