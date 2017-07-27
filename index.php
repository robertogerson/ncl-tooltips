<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  </head>
  <body style='width: 80%; margin: auto; padding-top: 20px;'>
    <center><h1><a name="top">Nested Context Language (NCL) 3.0 Tooltips</a></h1></center>
    <center>
      This NCL Tooltips provide summary description and authoring hints for each NCL element and attribute. They provide context-sensitive support for authors and tools (such as <a href="http://laws.deinf.ufma.br/ncleclipse">NCL Eclipse</a> and <a href="http://composer.telemidia.puc-rio.br">NCL Composer</a>).
    </center>
    <br/><br/>
    <?php
      $file_content = file_get_contents("help.txt");
      $array = explode("|", $file_content);

      //go to each element and create the index 
      echo "<div style='text-align: center; word-spacing: 13px;'>";
      for ($i = 0; $i < sizeof($array); $i += 4)
      {
        if(strcmp($current_el, trim($array[$i])))
        {
          $current_el = trim($array[$i]);
          echo " <a href='#".$current_el."'>".$current_el."</a> ";
        }
      }
      echo "</div>";
      echo "<br/>";

      echo "<table align='center'>";
      $current_el = "";
      for ($i = 0; $i < sizeof($array); $i += 4)
      {
        if(strcmp($current_el, trim($array[$i])))
        {
          $current_el = trim($array[$i]);
          echo "<tr style='background-color: white;'><td>&nbsp;</td><td>&nbsp;</td></tr>";
          echo "<tr style='background-color: white;'><td>&nbsp;</td><td style='text-align:right;'><a href='#top'>top</td></tr>";
          echo "<tr style='background-color: #4169e1; color: white;'><td style='font-size: 150%;'><a name='".$current_el."'>".$current_el."</a></td><td>".$array[$i+2]."</td></tr>";
        }
        else
        {
          echo "<tr style='background-color: lightblue;'><td>".$array[$i+1]."</td><td>".$array[$i+2];

          if (strcmp (trim($array[$i+3]), "") != 0 )
          {
            echo "<br/> <b>";
            echo "Dica: ".$array[$i+3]."</b>";
          }
          echo "</td></tr>";
        } 
      }
    ?>
  </body>
</html>
