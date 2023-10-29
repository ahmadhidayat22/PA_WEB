<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tiket.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Tiket List</title>

    <style>
        .container .sidebar .main .list-item:nth-child(6) {
            background-color: rgb(77, 148, 148);


        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <a href="#">

                    <div class="list-item">
                        <span class="description-header">Booking Site</span>
                    </div>

                </a>

                <div class="info-user">
                    <div class="picture"></div>
                    <div class="content" id="content">
                        <h5>ADMIN</h5>

                        <div class="online">
                            <div class="info"></div>
                            <p>online</p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="main">
                <div class="head-list">
                    <span>REPORTS</span>
                </div>
                <div class="list-item">

                    <a href="home.php">
                        <i class="bi bi-speedometer2"></i>
                        <span class="description">Dashboard</span>
                    </a>
                </div>
                <div class="list-item">

                    <a href="sales.php">
                        <i class="bi bi-cash"></i>
                        <span class="description">Sales</span>
                    </a>
                </div>

                <div class="head-list">
                    <span>MANAGE</span>
                </div>

                <div class="list-item">

                    <a href="users.php">
                        <i class="bi bi-people"></i>
                        <span class="description">Users</span>
                    </a>
                </div>

                <div class="list-item">

                    <a href="tiket.php">
                        <i class="bi bi-upc"></i>
                        <span class="description">Ticket</span>
                    </a>
                </div>



            </div>

        </div>

        <div class="main-content">
            <div id="menu-button">
                <input type="checkbox" name="" id="menu-checkbox">
                <label for="menu-checkbox" id="menu-label">
                    <div id="hamburger"></div>
                </label>
            </div>


            <div class="wrapper">
                <div class="header">
                    <p>Ticket</p>
                </div>

                <div class="isi">
                    <div class="head-content">
                        <button type="submit"><i class="bi bi-plus-lg"></i> New</button>

                    </div>
                    <div class="neck-content">
                        <span>

                            <label for="">Show</label>
                            <select id="entries" name="entries">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <label for="">entries</label>

                        </span>

                        <span>

                            <label for="">Search: </label>
                            <input type="text">
                        </span>
                    </div>

                    <div class="tabel-content">
                        <table>
                            <tr>
                                <th>Id</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Harga</th>
                                <th>Tools</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td width="15%">
                                    <button><i class="bi bi-pencil-fill"></i> Edit</button>
                                    <button><i class="bi bi-trash3-fill"></i> Delete</button>
                                </td>
                            </tr>
                         
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <script src="script.js"></script>

</body>

</html>