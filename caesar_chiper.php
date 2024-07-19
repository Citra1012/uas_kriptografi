<!DOCTYPE html>
<html>
<head>
    <title>Caesar Cipher</title>
</head>
<body>
    <h2>Caesar Cipher Enskripsi and Deskripsi</h2>
    <form method="post">
        <label for="text">Text:</label><br>
        <input type="text" id="text" name="text" required><br><br>

        <label for="shift">Shift:</label><br>
        <input type="number" id="shift" name="shift" required><br><br>

        <input type="radio" id="encrypt" name="action" value="encrypt" checked>
        <label for="encrypt">Encrypt</label><br>
        <input type="radio" id="decrypt" name="action" value="decrypt">
        <label for="decrypt">Decrypt</label><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function caesarCipher($text, $shift, $action) {
            $result = "";
            $shift = $shift % 26;

            if ($action == 'decrypt') {
                $shift = 26 - $shift;
            }

            for ($i = 0; $i < strlen($text); $i++) {
                $char = $text[$i];

                if (ctype_upper($char)) {
                    $result .= chr((ord($char) + $shift - 65) % 26 + 65);
                } elseif (ctype_lower($char)) {
                    $result .= chr((ord($char) + $shift - 97) % 26 + 97);
                } else {
                    $result .= $char;
                }
            }

            return $result;
        }

        $text = $_POST['text'];
        $shift = intval($_POST['shift']);
        $action = $_POST['action'];

        $result = caesarCipher($text, $shift, $action);

        echo "<h2>Result:</h2>";
        echo "<p>Original Text: $text</p>";
        echo "<p>Shift: $shift</p>";
        echo "<p>Action: $action</p>";
        echo "<p>Result: $result</p>";
    }
    ?>
</body>
</html>