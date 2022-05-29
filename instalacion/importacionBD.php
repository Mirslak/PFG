<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
$servidor = $_SERVER['SERVER_ADDR'];
$ddbb = $_GET['db'];
$user = $_GET['user'];
$pass = $_GET['password'];
$email =$_GET['email'];

/**
 * Import SQL from file
 *
 * @param string path to sql file
 */
function sqlImport($file)
{

    $delimiter = ';';
    $file = fopen($file, 'r');
    $isFirstRow = true;
    $isMultiLineComment = false;
    $sql = '';

    while (!feof($file)) {

        $row = fgets($file);

        // remove BOM for utf-8 encoded file
        if ($isFirstRow) {
            $row = preg_replace('/^\x{EF}\x{BB}\x{BF}/', '', $row);
            $isFirstRow = false;
        }

        // 1. ignore empty string and comment row
        if (trim($row) == '' || preg_match('/^\s*(#|--\s)/sUi', $row)) {
            continue;
        }

        // 2. clear comments
        $row = trim(clearSQL($row, $isMultiLineComment));

        // 3. parse delimiter row
        if (preg_match('/^DELIMITER\s+[^ ]+/sUi', $row)) {
            $delimiter = preg_replace('/^DELIMITER\s+([^ ]+)$/sUi', '$1', $row);
            continue;
        }

        // 4. separate sql queries by delimiter
        $offset = 0;
        while (strpos($row, $delimiter, $offset) !== false) {
            $delimiterOffset = strpos($row, $delimiter, $offset);
            if (isQuoted($delimiterOffset, $row)) {
                $offset = $delimiterOffset + strlen($delimiter);
            } else {
                $sql = trim($sql . ' ' . trim(substr($row, 0, $delimiterOffset)));
                query($sql);

                $row = substr($row, $delimiterOffset + strlen($delimiter));
                $offset = 0;
                $sql = '';
            }
        }
        $sql = trim($sql . ' ' . $row);
    }
    if (strlen($sql) > 0) {
        query($row);
    }

    fclose($file);
}

/**
 * Remove comments from sql
 *
 * @param string sql
 * @param boolean is multicomment line
 * @return string
 */
function clearSQL($sql, &$isMultiComment)
{
    if ($isMultiComment) {
        if (preg_match('#\*/#sUi', $sql)) {
            $sql = preg_replace('#^.*\*/\s*#sUi', '', $sql);
            $isMultiComment = false;
        } else {
            $sql = '';
        }
        if(trim($sql) == ''){
            return $sql;
        }
    }

    $offset = 0;
    while (preg_match('{--\s|#|/\*[^!]}sUi', $sql, $matched, PREG_OFFSET_CAPTURE, $offset)) {
        list($comment, $foundOn) = $matched[0];
        if (isQuoted($foundOn, $sql)) {
            $offset = $foundOn + strlen($comment);
        } else {
            if (substr($comment, 0, 2) == '/*') {
                $closedOn = strpos($sql, '*/', $foundOn);
                if ($closedOn !== false) {
                    $sql = substr($sql, 0, $foundOn) . substr($sql, $closedOn + 2);
                } else {
                    $sql = substr($sql, 0, $foundOn);
                    $isMultiComment = true;
                }
            } else {
                $sql = substr($sql, 0, $foundOn);
                break;
            }
        }
    }
    return $sql;
}

/**
 * Check if "offset" position is quoted
 *
 * @param int $offset
 * @param string $text
 * @return boolean
 */
function isQuoted($offset, $text)
{
    if ($offset > strlen($text))
        $offset = strlen($text);

    $isQuoted = false;
    for ($i = 0; $i < $offset; $i++) {
        if ($text[$i] == "'")
            $isQuoted = !$isQuoted;
        if ($text[$i] == "\\" && $isQuoted)
            $i++;
    }
    return $isQuoted;
}

function query($sql)
{
    global $mysqli;
    //echo '#<strong>SQL CODE TO RUN:</strong><br>' . htmlspecialchars($sql) . ';<br><br>';
    if (!$query = $mysqli->query($sql)) {
        //throw new Exception("Cannot execute request to the database {$sql}: " . $mysqli->error);
    }
}

set_time_limit(0);

$mysqli = new mysqli($servidor, 'debianDB', 'debianDB', $ddbb);
$mysqli->set_charset("utf8");

header('Content-Type: text/html;charset=utf-8');
sqlImport('estructura.sql');



//GENEERACION DEL FICHERO DE CONEXION CONEXION.PHP
$servidor= $_SERVER['SERVER_ADDR'];
shell_exec("touch conexion.php");

$file = fopen("conexion.php", "w");

fwrite($file, "<?php" . PHP_EOL);
fwrite($file, "try{" . PHP_EOL);
fwrite($file, "\$conexion = mysqli_connect('$servidor', 'debianDB', 'debianDB', '$ddbb');" . PHP_EOL);
fwrite($file, "}catch(Exception \$e){" . PHP_EOL);
fwrite($file, "echo 'Ocurrió algo con la base de datos: ' . \$e->getMessage();" . PHP_EOL);
fwrite($file, "}" . PHP_EOL);
fwrite($file, "?>" . PHP_EOL);
fclose($file);

//Damos permisos al fichero
shell_exec("mv conexion.php ../Codigo/database/");

//import de usuario Admin

include "../Codigo/database/conexion.php";
$query = "INSERT into `usuario` (`user`, `nombre` ,`password`, `rol_usuario`, `email`, `usuario_verificado`)VALUES ('$user','Administrador','$pass', '1', '$email', '1')";
$result = mysqli_query($conexion, $query);

if($result){
    echo "conseguido";    
    header('Location: ../Codigo/index.php');
}else{
    echo "no conseguido";
}
echo "Peak MB: ", memory_get_peak_usage(true)/1024/1024;

