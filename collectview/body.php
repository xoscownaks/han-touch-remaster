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
          speed:800, //default:500 �E��E��E��E����E�E�도
          auto: true, //default:false �E�동 �E�작
          captions: false, // �E��E��E��E�Etitle �E�성�E� �E��E�된�E�.
          autoControls: false, //default:false �E�지,�E�작 �E�트�E� �E��E�E css �E�정이 ���E��
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
