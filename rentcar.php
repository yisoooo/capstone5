<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCAR 중고차 검색</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow-y: auto;
        }
        .top-bar {
            background-color: #fff;
            padding: 5px 20px;
            font-size: 0.9em;
            text-align: right;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .top-bar a {
            margin-left: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .top-bar a:hover {
            text-decoration: underline;
        }
        .logo {
            font-size: 40px;
            font-weight: bold;
            color: #333;
        }
        header {
            border-bottom: 1px solid #ddd;
            background-color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-bar {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 5px 15px;
            display: flex;
            align-items: center;
        }
        .search-bar input {
            border: none;
            outline: none;
            font-size: 15px;
        }
        .search-bar input::placeholder {
            color: #676767;
        }
        nav {
            display: flex;
            gap: 15px;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        nav a:hover {
            color: #007bff;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 80px; /* 상단 고정 */
            z-index: 10;
            width: 100%; /* 화면 크기에 맞게 너비를 100%로 설정 */
            box-sizing: border-box;
        }
        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .filter-group select,
        .filter-group button {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            cursor: pointer;
        }
        .car-category {
            margin: 20px 0;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            position: sticky;
            top: 130px; /* 카테고리 고정 */
            background-color: #fff;
            z-index: 10;
            padding: 10px 0;
        }
        .car-category button {
            padding: 10px 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 20px;
            cursor: pointer;
        }
        .car-category button.active {
            background-color: #007bff;
            color: #fff;
        }
        .car-list {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }
        .car-card {
            background-color: #f9f9f9;
            width: 150px;
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .car-card img {
            width: 100%;
            height: 150px;
            background-color: #ddd;
            margin-bottom: 10px;
        }
        .car-card p {
            font-size: 14px;
            color: #555;
        }
        footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            margin-top: auto; 
        }
        footer div {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <a href="logout.php">로그아웃</a>
        <a href="mypage.php">마이페이지</a>
    </div>
    <header>
        <div class="logo"><a href="index1.php" style="text-decoration: none; color: inherit;">UCAR</a></div>
        <nav>
            <a href="gucsan.php">내차팔기</a>
            <a href="buycar.php">내차사기</a>
            <a href="rentcar.php">렌트</a>
            <a href="finance.php">금융</a>
            <a href="media.php">미디어</a>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="검색">
        </div>
    </header>

    <div class="container">
        <div class="filter-section">
            <div class="filter-group">
                <select>
                    <option>국산</option>
                    <option>수입</option>
                </select>
                <select>
                    <option>제조사</option>
                </select>
                <select>
                    <option>모델</option>
                </select>
                <button>검색</button>
            </div>
        </div>

        <div class="car-category">
            <button class="active" data-category="all">전체</button>
            <button data-category="sedan">세단</button>
            <button data-category="suv">SUV</button>
            <button data-category="rv">RV</button>
            <button data-category="sports">스포츠카</button>
            <button data-category="hybrid">하이브리드</button>
        </div>

        <div class="car-list">
            <div class="car-card" data-category="sedan">
                <img src="https://via.placeholder.com/150?text=세단" alt="세단">
                <p>현대 아반떼</p>
            </div>
            <div class="car-card" data-category="suv">
                <img src="https://via.placeholder.com/150?text=SUV" alt="SUV">
                <p>기아 쏘렌토</p>
            </div>
            <div class="car-card" data-category="rv">
                <img src="https://via.placeholder.com/150?text=RV" alt="RV">
                <p>현대 스타렉스</p>
            </div>
            <div class="car-card" data-category="sports">
                <img src="https://via.placeholder.com/150?text=스포츠카" alt="스포츠카">
                <p>포르쉐 911</p>
            </div>
            <div class="car-card" data-category="hybrid">
                <img src="https://via.placeholder.com/150?text=하이브리드" alt="하이브리드">
                <p>도요타 프리우스</p>
            </div>
            <div class="car-card" data-category="sedan">
                <img src="https://via.placeholder.com/150?text=세단" alt="세단">
                <p>기아 K5</p>
            </div>
            <div class="car-card" data-category="suv">
                <img src="https://via.placeholder.com/150?text=SUV" alt="SUV">
                <p>현대 팰리세이드</p>
            </div>
            <div class="car-card" data-category="sports">
                <img src="https://via.placeholder.com/150?text=스포츠카" alt="스포츠카">
                <p>람보르기니 우라칸</p>
            </div>
            <div class="car-card" data-category="hybrid">
                <img src="https://via.placeholder.com/150?text=하이브리드" alt="하이브리드">
                <p>혼다 인사이트</p>
            </div>
        </div>
    </div>

    <footer>
        <div>CUSTOMER CENTER: TEL 000-0000-0000000iv>
        <div>BANK ACCOUNT: 0000000000</div>
        <div>RETURN/EXCHANGE: 서울특별시 강남구 테헤란로 000</div>
        <div>유카 (UCAR) TEL. 000 0000 0000 OWNER. NNN</div>
        <div>COPYRIGHT © 유카 주식회사. ALL RIGHTS RESERVED.</div>
    </footer>

    <script>
        const categoryButtons = document.querySelectorAll('.car-category button');
        const carCards = document.querySelectorAll('.car-card');

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const category = button.dataset.category;

                carCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>

</body>
</html>
