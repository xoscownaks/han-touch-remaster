<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/body.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
    </script>
    <script src="./jquery/jquery.bxslider.min.js"></script>
    <link href="./jquery/jquery.bxslider.css" rel="stylesheet"/>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.bxslider').bxSlider({
          mode:'horizontal', //default : 'horizontal', options: 'horizontal', 'vertical', 'fade'
          speed:800, //default:500 E΄EΈEEϊ΅EEλ
          auto: true, //default:false Eλ Eμ
          captions: false, // E΄EΈEEEtitle Eμ±E΄ EΈEλE€.
          autoControls: false, //default:false Eμ§,Eμ EνΈE€ EΈEE css Eμ μ΄ ϊ±E
        });
      });
    </script>
  </head>
  <body>
    <h1>Today's Menu</h1>
      <ul class="bxslider">
        <li>
            <img id="MainPgBurger" src="./src/Mainburger1.png">
        </li>
        <li>
            <img id="MainPgBurger" src="./src/Mainburger2.png">
        </li>
        <li>
            <img id="MainPgBurger" src="./src/Mainburger3.png">
        </li>
        <li>
            <img id="MainPgBurger" src="./src/Mainburger4.png">
        </li>
      </ul>
  </body>
</html>
