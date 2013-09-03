<?php
$event = $this->model;
?>
<html>
    <head>
        <title><?php echo $event->title; ?> | WBESU Bookings System</title>
        <?php $this->css('reset'); ?>
        <?php $this->css('global'); ?>
    </head>
    <body>
        <div id="header">
            <ul class="headerlist">
                <li>WBESU Events</li>
                <li><a href="#">You</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Log in/out</a></li>
            </ul>
        </div>

        <div id="eventtitle">
            <ul id="eventtitlelist">
                <li>{{name}}</li>
                <li>{{starttime}}</li>
            </ul>
        </div>

        <h2>When is it?</h2>
        <div class="indent">{{timephrase}}</div>

        <h2>What is it?</h2>
        <div class="indent"><?php echo $event->description; ?></div>

        <h2>Where is it?</h2>
        <div class="indent"><?php echo $event->location; ?></div>
        <div id="googlemapcanvas"></div>

        <h2>How many places are there?</h2>
        <div class="indent">
            {{placesinfo}}
        </div>

        <h2>Can I go?</h2>
        <div class="indent">
            {{bookingform}}
        </div>

        <div id="footer">
            <ul class="footerlist">
                <li>WBESU Events System</li>
                <li><a href="#">Contact the Leaders</a></li>
                <li><a href="http://www.github.com/jacobwwalker/wbesu-events">Code by Jacob Walker</a></li>
            </ul>
        </div>
    </body>
</html>