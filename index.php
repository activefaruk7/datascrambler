<?php
include_once "functions.php";
$action = "encode";
if(isset($_GET["action"]) && $_GET["action"] != ""){
    $action = $_GET["action"];
}

$key ="";
if(isset($_POST['key']) && $_POST['key'] != ""){
    $key = $_POST['key'];
}else{
    $key = generateKey($action);
}

if("encode" == $action){
    $data = $_POST["data"] ?? "";
    if($data != ""){
        $result = scrambleData($key, $data);
    }
}

if("decode" == $action){
    $data = $_POST["data"] ?? "";
    if($data != ""){
        $result = decodeData($key, $data);
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-8 col-md-offset-2">
            <h2>Data Scrambler</h2>
            <p>It can scramble your secret letter for your loving person.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <header>
                <a href="?action=gkey" class="button">Generate Key</a>
                <a href="?action=encode" class="button">Encode</a>
                <a href="?action=decode" class="button">Decode</a>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="index.php<?php if($action == "decode"){ echo "?action=decode"; } ?>" method="POST">
            <fieldset>
                <legend>Scrambler form</legend>
                <div class="row responsive-label" style="align-items: center;">
                    <div class="col-sm-12 col-md-3 " style="text-align: right;">
                        <label class="doc" for="key">Key</label>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <input style="width: 85%;" class="doc" type="text" name="key" <?php displayVal($key); ?>/>
                    </div>
                    <div class="col-sm-12 col-md-3" style="text-align: right;">
                        <label class="doc" for="data">Data</label>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <textarea style="width: 85%;" class="doc" name="data"><?php echo $_POST["data"] ?? ""; ?></textarea>
                    </div>
                    <div class="col-sm-12 col-md-3" style="text-align: right;">
                        <label class="doc" for="sdata">Scrambled Data</label>
                    </div>
                    <div class="col-sm-12 col-md-9">
                        <textarea style="width: 85%;" class="doc" name="sdata"><?php echo $result ?? ""; ?></textarea>
                    </div>
                    <div class="col-sm-12 col-md-9 col-md-offset-3">
                        <input class="doc" type="submit" name="sbutton" value="Scramble Now">
                    </div>
                </div>
            </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>