<!DOCTYPE html>
<?php

require_once('database.php');

$db = db_connect();

if(isset($_POST["submit"])) {

    $value_array = [];

    $english = $_POST["english"];
    $char1 = $_POST["char1"];
    $char2 = $_POST["char2"];
    $char3 = $_POST["char3"];
    $char4 = $_POST["char4"];
    $char5 = $_POST["char5"];
    $char6 = $_POST["char6"];
    $char7 = $_POST["char7"];
    $char8 = $_POST["char8"];
    $char9 = $_POST["char9"];
    $char10 = $_POST["char10"];
    $char11 = $_POST["char11"];
    $char12 = $_POST["char12"];
    $char13 = $_POST["char13"];
    $char14 = $_POST["char14"];
    $char15 = $_POST["char15"];
    $char16 = $_POST["char16"];
    $char17 = $_POST["char17"];
    $char18 = $_POST["char18"];
    $char19 = $_POST["char19"];
    $char20 = $_POST["char20"];

    $sql ="INSERT INTO characters ";
    $sql .= "(english, char1, char2, char3, char4, char5, char6, char7, char8, char9, char10, ";
    $sql .= "char11, char12, char13, char14, char15, char16, char17, char18, char19, char20) ";
    $sql .= "VALUES (";
    $sql .= "'" . $english . "',";
    $sql .= "'" . $char1 . "',";
    $sql .= "'" . $char2 . "',";
    $sql .= "'" . $char3 . "',";
    $sql .= "'" . $char4 . "',";
    $sql .= "'" . $char5 . "',";
    $sql .= "'" . $char6 . "',";
    $sql .= "'" . $char7 . "',";
    $sql .= "'" . $char8 . "',";
    $sql .= "'" . $char9 . "',";
    $sql .= "'" . $char10 . "',";
    $sql .= "'" . $char11 . "',";
    $sql .= "'" . $char12 . "',";
    $sql .= "'" . $char13 . "',";
    $sql .= "'" . $char14 . "',";
    $sql .= "'" . $char15 . "',";
    $sql .= "'" . $char16 . "',";
    $sql .= "'" . $char17 . "',";
    $sql .= "'" . $char18 . "',";
    $sql .= "'" . $char19 . "',";
    $sql .= "'" . $char20 . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    $all_challenges = find_all();
    $challenge_array = mysqli_fetch_assoc($all_challenges);
    filter_blank($challenge_array);
}
function find_all() {
        global $db;
        $sql = "SELECT * FROM characters ";
        $sql .= "ORDER BY id DESC";
        $result = mysqli_query($db, $sql);
        return $result;
    }
function filter_blank($array) {
    global $value_array;
    foreach($array as $challenge) {
        if($challenge != "" && $challenge != null && is_numeric($challenge) == false) {
            array_push($value_array, $challenge);
        }
    }
    return $value_array;
}
$all_challenges = find_all();
?>
<html id='html'>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="grammar.css">
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function(){
            var clicked = false;
            $('#panel1').click(function(){
                if (!clicked){
                    clicked = true;
                    $('#container').slideDown();
                    $('#log-container').slideDown();
                } else {
                    clicked = false;
                    $("#container").slideUp();
                    $("#log-container").slideUp();
                }
            })
        });
        $(document).ready(function(){
            var clicked = false;
            $('#panel2').click(function(){
                if (!clicked){
                    clicked = true;
                    $('#log-container').slideDown();
                } else {
                    clicked = false;
                    $("#log-container").slideUp();
                }
            })
        });
        $(document).ready(function() {
            $('#outer').click(function(){
                $('#container').slideUp();
                $('#log-container').slideUp();
            });
        })

        $(document).ready(function() {
            $(".new_row").first().click();
        })
        $("#html").mouseleave(function() {
            $("#mouseleave").html("User's mouse left the page!");
        })
    </script>

    <body>
        <div id="center">
            <div class="slide-down-panel" id="panel1" style="width: 45.35%"><p>Add new challenge</p></div>
            <div class="slide-down-panel" id="panel2" style="width: 45.35%; float: right"><p>Challenge list</p></div>

            <div id="container">
                <form id="form" name="form" method="POST" action="" enctype="multipart/form-data">

                    English meaning: <br/><input type="text" id="english" name="english"><br/>

                    <label>Correct Chinese characters: </label><br/>

                    <div class="divContainer" id="should-look-container">
                        <input type="text" id="char1" name="char1" style="width:50px;display:inline-block;margin-bottom:3px" >
                        <input type="text" id="char2" name="char2" style="width:50px;display:inline-block;margin-bottom:3px" >
                        <input type="text" id="char3" name="char3" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char4" name="char4" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char5" name="char5" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char6" name="char6" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char7" name="char7" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char8" name="char8" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char9" name="char9" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char10" name="char10" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char11" name="char11" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char12" name="char12" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char13" name="char13" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char14" name="char14" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char15" name="char15" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char16" name="char16" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char17" name="char17" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char18" name="char18" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char19" name="char19" style="width:50px;display:inline-block;margin-bottom:3px">
                        <input type="text" id="char20" name="char20" style="width:50px;display:inline-block;margin-bottom:3px">
                    </div><br/>

                    <input type="submit" value="Create" id="submit" name="submit">
                </form>
            </div>

            <div id="log-container">
                <?php while($challenge = mysqli_fetch_assoc($all_challenges)) { ?>

                    <div class='new_row' style="background-color: whitesmoke;z-index:99;border-radius:3px;box-shadow: 0px 1px 1px black;border:1px solid black;cursor:pointer;user-select:none">

                        <div id="info" style="width:85%;display:inline-block">
                            <?php echo "<div class='english' style='color:cornflowerblue;margin-left:1px'>" . $challenge['english'] . "</div>"; ?>
                        </div>

                        <input type='submit' name='delete' id='delete' value='x' style='color:red;float:right;display:inline-block;margin:9px;cursor:pointer;color:white;background-color:red;border:1px solid black;border-radius:100%'>

                        <div class="content" style="display:inline-block">

                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char1'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char2'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char3'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char4'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char5'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char6'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char7'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char8'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char9'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char10'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char11'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char12'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char13'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char14'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char15'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char16'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char17'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char18'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char19'] . "</div>"; ?>
                            <?php echo "<div style='color:whitesmoke;display:inline-block;user-select:none'>" . $challenge['char20'] . "</div>"; ?>

                        </div>

                    </div><br/>
                <?php } ?>
                <style>
                    .center_div {
                        margin:auto;
                    }
                </style>
                <script>
                    // Fisher-Yates Shuffle Algorithm.
                    function shuffle(array) {
                      var m = array.length, t, i;

                      // While there remain elements to shuffle…
                      while (m) {

                        // Pick a remaining element…
                        i = Math.floor(Math.random() * m--);

                        // And swap it with the current element.
                        t = array[m];
                        array[m] = array[i];
                        array[i] = t;
                      }

                      return array;
                    };
                    $("#delete").click(function() {
                        var value = $(this).parent().find(".english").text();
                        alert(value);

                        $.ajax({
                            url: 'delete.php',
                            type: 'POST',
                            data: {'english' : value},
                            success: function() {
                                alert(value);
                            }
                        });
                    });
                    $(".new_row").click(function() {
                        var info = $(this).find('.info');
                        var content = $(this).find('.content');
                        var english = $(this).find('.english');

                        var children1base = $();
                        var children2;
                        var children1;
                        var correct = new Audio('sounds/correct.wav');
                        var wrong = new Audio('sounds/wrong.wav');
                        var complete = new Audio('sounds/complete.wav');
                        var count = 0;

                        $("#outer").empty();

                        $(content).children().each(function() {
                            if($(this).text() != "" && $(this).text() != null) {
                                children1base = $(children1base).add($(this));

                                var clone = children1base.clone();
                                children2 = shuffle(clone);
                            }
                        })
                        $("#outer").append("<div class='english_div'></div>");
                        $(".english_div").css({"margin": "auto","display": "flex", "margin-bottom": "20px", "color": "black"});
                        $("#outer").append("<div class='correct_div'></div>");
                        $(".correct_div").css({"margin": "auto","display": "flex", "margin-bottom": "160px"});
                        $("#outer").append("<div class='wrong_div'></div>");
                        $(".wrong_div").css({"margin": "auto","display": "flex"});

                        children1 = children1base.clone();
                        var english_clone = english.clone();

                        $(english_clone).css({"color": "black","margin": "auto","font-size":"20px","background-color":"whitesmoke"});
                        $(children1).css({"background-color": "whitesmoke", "margin": "auto", "width": "60px", "height": "35px", "border": "1px solid black", "user-select": "none","cursor": "pointer"});
                        $(children2).css({"background-color": "whitesmoke","color": "black", "margin": "auto", "width": "60px", "height": "35px", "box-shadow": "0px 1px 1px black", "user-select": "none","cursor": "pointer"});

                        $(".english_div").append(english_clone);
                        $(".correct_div").append(children1);
                        $(".wrong_div").append(children2);

                        $(children1).droppable({
                            accept: children2,
                            drop: function(ev, ui) {
                                var dropped = $(ui.draggable);
                                 ui.draggable.position({
                                    my: "center",
                                    at: "center",
                                    of: $(this),
                                 });
                                if($(this).text() == dropped.text()){
                                    correct.play();
                                    $(ui.draggable).css({"backgroundColor": "greenyellow"});
                                    count++;
                                    if(count == children1.length){
                                        complete.play();
                                        $("#outer").append("<div style='display:flex;width:100%'><p style='margin:auto;font-size:60px'>Correct!</p></div>");
                                        $("#log-container").slideDown();

                                        $("#log-container div:contains(" +english.text()+ ")").css({"background-color": "greenyellow","color": "cornflowerblue"});

                                     }
                                 } else {
                                     wrong.play();
                                     $(ui.draggable).css({"backgroundColor": "red"});
                                     $("#outer").append("<div style='display:flex;width:100%'><p style='margin:auto;font-size:60px;color:red'>Wrong!</p></div>");
                                     $("#log-container").slideDown();
                                     $("#log-container div:contains(" +english.text()+ ")").css({"color": "red", "background-color": "whitesmoke"});
                                 }
                                if(children2.style.backgroundColor = "greenyellow"){
                                    alert("complete");
                                }
                            }
                        });
                        $(children2).draggable({

                            cursor: "pointer",
                            drag: function(event, ui){
                                $(this).css({"backgroundColor": "white"});
                            }
                        });
                    });

                </script>
            </div>
            <div id="outer"></div>
            <div id="mouseleave" style="color:red;padding-left:8px;bottom:0px"></div>
        </div>
    </body>

</html>
