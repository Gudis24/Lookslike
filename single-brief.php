<?php
/**
 *
 *
 */

get_header();
?>

<div class="pageContainer">
    <?php $key = get_field('klucze', 'option'); ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?= $key["recaptcha_v3_public_key"]?>"></script>
     <form action="" class="brief flexing siteWidth" id="briefForm" method="post">
      <?php
      global $post;

      $question_group = get_post_meta($post->ID, 'customdata_group', true);
      $n = 0;
      if (is_array($question_group ) && count($question_group )>=1):
        foreach($question_group as $number){
          if($number["TypItem"] == "checkbox" || $number["TypItem"] == "radio" || $number["TypItem"] == "pytanie"){
            $n++;
          }
        }
      endif;
      $i = 0;
      $j = 0;
      if (is_array($question_group ) && count($question_group )>=1):
      foreach ( $question_group as $field ) {
        ?>
          <?php if($field["TypItem"] == "tytul"): $j++; ?>
            <div class="fieldTitle <?php if($j == 1): echo "active"; endif; ?>" data-title-id="<?= $j ?>">
              <h2 class="heading">
                <div class="title">
                  <?= $field["PytanieItem"]; ?>
                </div>
              </h2>
            </div>

          <?php else: ?>
            <div class="field <?php if($i == 0): echo "active"; endif; ?>" data-id="<?= $i ?>"  data-title-id-field="<?= $j ?>">
              <div class="step">
                <font class="current"><?= $i+1 ?></font>/<font class="max"><?= $n ?></font>
              </div>
              <?php if($field["TypItem"] === "checkbox"): ?>
                <h5 class="heading">
                  <div class="title">
                    <?= $field["PytanieItem"]; ?>
                    <input type="hidden" name="question[<?= $i ?>][q]" value="<?= $field["PytanieItem"]; ?>">
                  </div>
                </h5>
                <?php
                if(explode(PHP_EOL, $field["OptionsItem"])) {
                  $array = explode(PHP_EOL, $field["OptionsItem"]);
                  $check_id = 0;
                  $b = 0;
                  foreach($array as $arr):
                    ?>
                  <?php if($arr === "Inne" || $arr === "inne" || $arr === "INNE" ): ?>
                    <label class="labelContainer containerLine">
                      <input type="checkbox" name="question[<?= $i ?>][<?= $b ?>][a]" value="<?= $arr ?>">
                      <span class="checkmark"></span>
                      <div><?= $arr ?></div>
                      </br>
                      <textarea class="textBoxBrief input" type="text" name="question[<?= $i ?>]" value="" style="opacity:1;width:100%;height:80px;position:relative;"></textarea>
                    </label>
                    </br>
                    <?php
                    $check_id++;
                    else: ?>
                    <label class="labelContainer">
                      <input type="checkbox" name="question[<?= $i ?>][checkbox][<?= $b ?>]" value="<?= $arr ?>">
                      <span class="checkmark"></span>
                      <div><?= $arr ?></div>
                    </label>
                    </br>
                    <?php
                    $check_id++;
                    endif;
                    $b++;
                  endforeach;
                }
                 ?>

              <?php elseif($field["TypItem"] == "radio"): ?>
                <h5 class="heading">
                  <div class="title">
                    <?= $field["PytanieItem"]; ?>
                    <input type="hidden" name="question[<?= $i ?>][q]" value="<?= $field["PytanieItem"]; ?>">
                  </div>
                </h5>
                <?php
                  if(explode(PHP_EOL, $field["OptionsItem"])) {
                    $array = explode(PHP_EOL, $field["OptionsItem"]);
                    $check_id = 0;
                    foreach($array as $arr):
                      ?>
                      <label for="item" class="containerRadio"><?= $arr ?>
                        <input type="radio" name="question[<?= $i ?>][a]" value="<?= $arr ?>">
                        <span class="checkmarkRadio"></span>
                      </label>

                      </br>
                      <?php
                      $check_id++;
                    endforeach;
                  }
                 ?>
              <?php elseif($field["TypItem"] == "pytanie"): ?>
                <h5 class="heading">
                  <div class="title">
                    <?= $field["PytanieItem"]; ?>
                    <input type="hidden" name="question[<?= $i ?>][q]" value="<?= $field["PytanieItem"]; ?>">
                  </div>
                </h5>
                <div class="containerLine">
                  <textarea class="input" placeholder="" title="Title" name="question[<?= $i ?>][a]"></textarea>
                 <span class="border"></span>
                </div>

              <?php endif; ?>
                <div class="navigation">

                  <?php if($i !== 0):  ?>
                  <div class="prev"><?php _e('Poprzedni', 'lookslike') ?></div>
                  <?php endif; ?>
                  <?php  if(count($question_group)-1 !== $i): ?>
                  <div class="next"><?php _e('Następny', 'lookslike') ?></div>
                  <?php endif; ?>
                </div>
              </div>
                <?php $i++; ?>
          <?php endif; ?>

  <?php  } ?>
<?php endif; ?>
          <div class="field" data-id="<?= $i ?>" data-title-id-field="<?= $j ?>">
            <h5 class="heading">
              <div class="title">
                <?php _e('Informacje, na które kierować będziemy przygotowaną ofertę', 'lookslike'); ?>
              </div>
            </h5>
            <div class="containerLine">
                <input type="text" class="input" placeholder="Adres e-mail" title="mail" name="email" >
               <span class="border"></span>
               <div id="email"></div>
            </div>
            <div class="containerLine">
              <input type="text" class="input" placeholder="Numer Telefonu" title="number" name="phone">
             <span class="border"></span>
             <div  id="phone"></div>
            </div>
            <div class="navigation">
                <div class="prev"><?php _e('Poprzedni', 'lookslike'); ?></div>
                <button type="submit" class="send button"><?php _e('Wyślij', 'lookslike'); ?>

                <input type="hidden" name="action" value="formAjaxBrief" style="display: none; visibility: hidden; opacity: 0;">
            </div>
          </div>

          <?php
          $rand = substr(md5(microtime()),rand(0,26),15);
          $security = "security_".$rand;
           ?>
          <input type="hidden" id="token" name="token">
          <input type="hidden" id="security" name="security" value="<?=$security?>">
        </form>
        <?php  $ajax_nonce = wp_create_nonce( "security_".$security );  ?>
        <script>
          grecaptcha.ready(function() {
              grecaptcha.execute('<?= $key["recaptcha_v3_public_key"]?>', {action: 'homepage'}).then(function(token) {
                 // console.log(token);
                 document.getElementById("token").value = token;

              });
          });
        </script>
</div>


<style media="screen">
  .brief .field{
    padding-bottom:90px;
  }
  .labelContainer {
      margin-right: 15px;
      line-height: 21px;
  }
.labelContainer div{
  padding-left:30px;
}

  .labelContainer {
      display: block;
      position: relative;

      margin-bottom: 12px;
      cursor: pointer;
      font-size: 16px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
  }
  .labelContainer .textBoxBrief{
    margin-top:0px !important;
  }
  .labelContainer input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
  }
  .checkmark {
      border: 1px solid #989898;
      position: absolute;
      top: 0;
      left: 0;
      height: 21px;
      width: 21px;
      background-color: transparent;
  }
  .labelContainer .checkmark:after {
      left: 6px;
      top: 3px;
      width: 4px;
      height: 8px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
  }
  .checkmark:after {
      content: "";
      position: absolute;
      display: none;
  }
  .labelContainer input:checked ~ .checkmark {
      background-color: #0000ff;
  }
  .labelContainer input:checked ~ .checkmark:after {
      display: block;
  }


  .brief.siteWidth {max-width: 600px;width: calc(100% - 30px);}
  .brief input.input::placeholder{
    color:#000;
  }
  .brief input.input, .brief textarea{
    padding-left:12px !important;
  }
  .step{
    position: absolute;
    bottom: 25px;
    left: 20px;
    font-weight: 600;
  }
  .step .current{
    color: #00F;
    font-size: 28px;

  }
  .step font{
    margin:0 4px;
  }
  .brief .navigation{
    position:absolute;
    display: flex;
    bottom: 25px;
    right: 30px;
    cursor:pointer;
    font-weight: 600;
    color: #0000FF;
    align-items: center;
  }
  .brief .prev{
    margin-right:30px;
  }
  .brief  .field h5{
    margin-bottom:70px !important;
  }
  .pageContainer{
    background-color: rgb(227, 237, 253);
  }
  .brief .heading{
    display: flex;
    justify-content: flex-start;
  }
  .brief{
    padding:150px 0px;
    display:flex;
    flex-direction: column;
    flex-wrap:wrap;
  }

  .brief .field{
    display:none;
    position:relative;
    padding:50px 65px;
    padding-bottom: 90px;
    background:#fff;
    margin-top:50px;
    flex: 1 0 100%;
    min-height:500px;
    margin: 25px auto;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.3);
    width:100%;

  }
  .brief > .field.active, .brief > .fieldTitle.active{
    display:block;
  }
  .brief .title{
    font-size:15px;
    text-align:left;
    line-height: 1.5;
    margin-left:0px;
    text-transform: none;
    font-weight: normal;
  }

/* input */

  .containerLine {
   position: relative;
  }
  .containerLine input[type="text"], .containerLine textarea { width: 100%; }
  .containerLine .input {
   border: 0;
   padding: 10px 0;
   border-bottom: 1px solid #ccc;
   color:#000;
   margin-top:40px;
   background-color:rgb(227, 237, 253);
  }
  .containerLine .input ~ .border {
   position: absolute;
   bottom: 0;
   left: 0;
   width: 0;
   height: 2px;
   background-color: #0000FF;
  }
  .containerLine .input:focus ~ .border {
   width: 100%;
   transition: 0.5s;
  }
  .field input{
    margin-bottom:10px;
  }
  .fieldTitle .title{
    color:#000;
    font-size: 20px;
    line-height: 1.3;
    padding-bottom:15px;
    position:relative;
    font-weight: bold;
  }
  .fieldTitle{
    display:none;
  }
  .fieldTitle .title::after{
    content:"";
    position:absolute;
    display:block;
    bottom:-10px;
    left:0px;
    width:50%;
    height:1.5px;
    background-color:#0000FF;
  }
  .navigation:hover{

  }
  .validateFormFail{
    color:#d9534f;
  }

  /* radio */
  /* The container */
.containerRadio {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.containerRadio input {
  position: absolute;
  opacity: 0;
  left:0;
  right:0;
  top:0;
  bottom:0;
  width:100%;height: 100%;
  margin: 0;
  cursor: pointer;
  z-index: 9;
}

/* Create a custom radio button */
.containerRadio .checkmarkRadio {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.containerRadio:hover input ~ .checkmarkRadio {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.containerRadio input:checked ~ .checkmarkRadio {
  background-color: #0000FF;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.containerRadio .checkmarkRadio:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.containerRadio input:checked ~ .checkmarkRadio:after {
  display: block;
}
  /* radio */
  @media(max-width:480px) {
    .brief .field {padding: 30px 20px;}
    .fieldTitle {padding: 0 20px}
    .brief {padding: 50px 0}
    .brief .field{
      padding-bottom:70px;
    }
  }
</style>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery(".navigation .next").click(function(){
      var number = jQuery(this).parent().parent().data("id");
      var target_number = number + 1;
      jQuery('[data-id="'+number+'"]').fadeOut(0).removeClass("active");
      jQuery('[data-id="'+target_number+'"]').fadeIn(0).addClass("active");
      var number_title = jQuery('.field.active').data("title-id-field");
      jQuery('.fieldTitle').fadeOut(0).removeClass("active");
      jQuery('[data-title-id="'+number_title+'"]').fadeIn(0).addClass("active");
      jQuery('html, body').animate({
         scrollTop: jQuery("#briefForm").offset().top
      }, 300);
    });
    jQuery(".navigation .prev").click(function(){
      var number = jQuery(this).parent().parent().data("id");
      var target_number = number - 1;
      jQuery('[data-id="'+number+'"]').fadeOut(0).removeClass("active");
      jQuery('[data-id="'+target_number+'"]').fadeIn(0).addClass("active");
      var number_title = jQuery('.field.active').data("title-id-field");
      jQuery('.fieldTitle').fadeOut(0).removeClass("active");;
      jQuery('[data-title-id="'+number_title+'"]').fadeIn(0).addClass("active");
      jQuery('html, body').animate({
         scrollTop: jQuery("#briefForm").offset().top
      }, 300);
    });
  });

  jQuery( '#briefForm' ).on( 'submit', function(event) {
    event.preventDefault();
      var form_data = jQuery( this ).serializeArray();
      console.log(form_data);
      form_data.push( { "name" : "security", "value" : "<?= $ajax_nonce ?>" } );

      jQuery.ajax({
          url : '<?= admin_url('admin-ajax.php'); ?>',
          type : 'POST',
          data : form_data,
          success : function( response ) {
            response = JSON.parse(response);
            if(response.status == false){
              jQuery("#briefForm .validateFormFail").remove();
              if(response.message.email){
                jQuery("#briefForm #email").append("<p class='validateFormFail'>"+response.message.email+"</p>");
              }
              if(response.message.phone){
                jQuery("#briefForm #phone").append("<p class='validateFormFail'>"+response.message.phone+"</p>");
              }


            }
            if(response.status == true){

                jQuery("#briefForm .field").html("<b>Dziękujemy za wypełnienie Briefu. Wkrótce wyślemy gotową ofertę na podany przez Ciebie adres e-mail.</b>");

            }
          },
          fail : function( err ) {

              alert( "wystąpił błąd: " + err );
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
          }
      });

      return false;
  });

</script>



<?php get_footer(); ?>
