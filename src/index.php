<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcstarioni
 * Date: 07.05.2018
 * Time: 15:16
 */
//phpinfo();
require("medicinesTest.php");
$client = SoapConnect();
echo getMedicine($client,"a3ebc9b4-770b-11e3-bd9e-005056b10012");