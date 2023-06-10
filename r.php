<?php

// Open the file for writing and truncate its content
$file = fopen('location.txt', 'w');
ftruncate($file, 0);
fclose($file);

// Check if the file was truncated
if (filesize('location.txt') === 0) {
  echo "تم مسح المواقع والايبيهات الحاليه.";
  
  echo '<form method="POST" action="r.html">
        <button style="font-size: 24px; padding: 10px 20px;">اضغط هنا للرجوع</button>
      </form>';
  
} else {
  echo "فشل مسح المواقع والايبهات الحاليه";
}


