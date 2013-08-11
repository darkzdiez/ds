<?php
while ($result = mysql_fetch_array($results, MYSQL_ASSOC)) {
    ?>
    <div class="comment_container">
        <div class="date">
            <?php
            $date = date::format_date($result['date'], DATETIME_ARRAY);
            print $date['day'] . '.' . $date['month'] . '.' . $date['year'] . ' ' . $date['hour'] . ':' . $date['minute'] . ' ' . $date['meridiem'];
            ?>
        </div>
        <div class="user"><?php print $result['name']; ?>:</div>
        <div class="comment"><?php print $result['comment']; ?></div>
    </div>
    <?php
}
?>