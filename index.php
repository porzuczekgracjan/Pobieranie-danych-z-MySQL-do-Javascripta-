<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button id="przyci">Pokaż</button>
          <div class="php" style="display:none">

<ul id="people"></ul>
    <script>
      /*
      var person = {
        name: "Brad",
        age: 35,
        address:{
          street:"5 main st",
          city: "Boston"
        },
        children:["Brianna", "Nicholas"]
      }

      //person = JSON.stringify(person);
      //person = JSON.parse(person);

      var people = [
        {
          name:"Brad",
          age: 35
        },
        {
          name:"John",
          age:40
        },
        {
          name:"Sara",
          age:25
        }
      ];

      //console.log(people[1].age);
      var output = '';
      for(var i = 0;i < people.length;i++){
        //console.log(people[i].name);
        output += '<li>'+people[i].name+'</li>';
      }
      document.getElementById('people').innerHTML = output;
      */

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(xhttp.responseText);
            var people = response.people;

            var output = '';
            for(var i = 0;i < people.length;i++){
              output += '<li>'+people[i].name+'</li>';
            }
            document.getElementById('people').innerHTML = output;
          }
      };
      xhttp.open("GET", "dane.php", true);
      xhttp.send();

    </script>
    
    <?php

    $connect = mysqli_connect("localhost", "root","","testing");

    $sql = "SELECT * FROM tbl_employee";

    $result = mysqli_query($connect, $sql);

    $json_array = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $json_array[] = $row;
    }

    echo json_encode($json_array);
    /*echo '<pre>';
    print_r($json_array);
    echo '';
    ?>
 */
?>
    
</body>
<script src="main.js"></script>
</html>