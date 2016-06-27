<?php
$conn = mysqli_connect("localhost", "root", "1234", "IA")or die ("mysql connect failed");
mysqli_query($conn, 'SET NAMES UTF8')or die ("error");
