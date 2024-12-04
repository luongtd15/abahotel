<div class="search-results">
    <h2 >Search Result</h2>
    
    <?php if (!isset($results) || empty($results)): ?>
        <p style="color:red">No result match.</p>
    <?php else: ?>
        <div class="room-grid">
            <?php foreach ($results as $room): ?>
                <div class="room-card">
                    <img src="<?= isset($room['image']) ? htmlspecialchars($room['image']) : 'path/to/default-image.jpg' ?>" 
                         alt="<?= isset($room['name']) ? htmlspecialchars($room['name']) : 'Room Image' ?>">
                    <div class="room-info">
                        <h3><?= htmlspecialchars($room['name']) ?></h3>
                        <p class="room-type">Room Type: <?= isset($room['type_name']) ? htmlspecialchars($room['type_name']) : 'N/A' ?></p>
                        <p class="room-price">Price: <?= isset($room['price']) ? number_format($room['price']) : 0 ?> $</p>                        <p class="room-status">
                            Status: 
                            <?php if ($room['status'] === 'available'): ?>
                                <span class="available">available </span>
                            <?php else: ?>
                                <span class="occupied">occupied</span>
                            <?php endif; ?>
                        </p>
                        <a href="?act=room-detail&id=<?= $room['id'] ?>" class="view-detail"> View Detail Room</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<style>
.search-results {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.search-results h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
    font-size: 28px;
}

.room-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
    padding: 20px 0;
}

.room-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.room-card:hover {
    transform: translateY(-5px);
}

.room-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.room-info {
    padding: 20px;
}

.room-info h3 {
    color: #2c3e50;
    font-size: 20px;
    margin-bottom: 15px;
}

.room-type, .room-price, .room-status {
    color: #666;
    margin: 8px 0;
    font-size: 15px;
}

.room-status span {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 14px;
}

.available {
    background-color: #e3fcef;
    color: #00a650;
}

.occupied {
    background-color: #ffe5e5;
    color: #ff4444;
}

.view-detail {
    display: inline-block;
    margin-top: 15px;
    padding: 8px 20px;
    background-color: #E6E6FA;
    color: black;
    text-decoration: none;
    border-radius: 6px;
    transition: background-color 0.3s ease;
}

.view-detail:hover {
    background-color: #2980b9;
}

/* Responsive Design */
@media (max-width: 768px) {
    .room-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .search-results {
        padding: 15px;
    }
}

/* Animation cho các card */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.room-card {
    animation: fadeIn 0.5s ease-out forwards;
}

/* Thêm loading skeleton effect */
.room-card.loading {
    position: relative;
    overflow: hidden;
}

.room-card.loading::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}
</style>