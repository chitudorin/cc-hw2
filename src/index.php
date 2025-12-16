<!DOCTYPE html>
<html>
<head>
    <title>Insert Page</title>
</head>
<body>
    <center>
        <h2>Add items</h2>
        <form action="insert.php" method="POST">
            Item:
            <input name="item" required type="text"/>
            <br/><br/>
            <input type="submit" value="Enter"/>
        </form>

        <?php
                function get_items()
                {
                    $servername = getenv("DBSERVER");
                    $username = getenv("DBUSER");
                    $password = getenv("DBPASS");
                    $dbname = getenv("DBNAME");

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $ret = array();
                    $sql = "SELECT * FROM items";
                    $res = mysqli_query($conn, $sql);

                    while($ar = mysqli_fetch_assoc($res))
                    {
                        $ret[] = $ar;
                    }
                    return $ret;
                }
                
                $items = get_items(); 

                foreach($items as $item) {
                    $name = $item['name'];
                    ?>
                    <div class = "section_4">
                            <h1 class = "food_h2"><?php echo $name; ?></h1>
                    </div>
                    <?php 
                }
            ?>
    </center>
</body>
</html>