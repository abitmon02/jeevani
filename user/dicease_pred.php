<?php


require '../db/config.php';
require '../db/session.contr.cls.php';

$docotr_data = [
  "back_pain",
  "constipation",
  "abdominal_pain",
  "diarrhoea",
  "mild_fever",
  "yellow_urine",
  "yellowing_of_eyes",
  "acute_liver_failure",
  "fluid_overload",
  "swelling_of_stomach",
  "swelled_lymph_nodes",
  "malaise",
  "blurred_and_distorted_vision",
  "phlegm",
  "throat_irritation",
  "redness_of_eyes",
  "sinus_pressure",
  "runny_nose",
  "congestion",
  "chest_pain",
  "weakness_in_limbs",
  "fast_heart_rate",
  "pain_during_bowel_movements",
  "pain_in_anal_region",
  "bloody_stool",
  "irritation_in_anus",
  "neck_pain",
  "dizziness",
  "cramps",
  "bruising",
  "obesity",
  "swollen_legs",
  "swollen_blood_vessels",
  "puffy_face_and_eyes",
  "enlarged_thyroid",
  "brittle_nails",
  "swollen_extremeties",
  "excessive_hunger",
  "extra_marital_contacts",
  "drying_and_tingling_lips",
  "slurred_speech",
  "knee_pain",
  "hip_joint_pain",
  "muscle_weakness",
  "stiff_neck",
  "swelling_joints",
  "movement_stiffness",
  "spinning_movements",
  "loss_of_balance",
  "unsteadiness",
  "weakness_of_one_body_side",
  "loss_of_smell",
  "bladder_discomfort",
  "foul_smell_of urine",
  "continuous_feel_of_urine",
  "passage_of_gases",
  "internal_itching",
  "toxic_look_(typhos)",
  "depression",
  "irritability",
  "muscle_pain",
  "altered_sensorium",
  "red_spots_over_body",
  "belly_pain",
  "abnormal_menstruation",
  "dischromic _patches",
  "watering_from_eyes",
  "increased_appetite",
  "polyuria",
  "family_history",
  "mucoid_sputum",
  "rusty_sputum",
  "lack_of_concentration",
  "visual_disturbances",
  "receiving_blood_transfusion",
  "receiving_unsterile_injections",
  "coma",
  "stomach_bleeding",
  "distention_of_abdomen",
  "history_of_alcohol_consumption",
  "fluid_overload",
  "blood_in_sputum",
  "prominent_veins_on_calf",
  "palpitations",
  "painful_walking",
  "pus_filled_pimples",
  "blackheads",
  "scurring",
  "skin_peeling",
  "silver_like_dusting",
  "small_dents_in_nails",
  "inflammatory_nails",
  "blister",
  "red_sore_around_nose",
  "yellow_crust_ooze",
];

$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
  $user_data = $sessObj->getSessionData();
  require 'header.php';
?>
  <!-- Page Content -->
  <div class="overview">
    <div class="row m-2">
      <div class="col-lg-12">
        <h2 style="color: #9f8e64;margin-top: 10px;">Disease Prediction</h2>
        <div class="row form-group mt-3">
          <div class="form-group col-md-3 space-between">
            <select name="symtomp1" class="form-control" id="symtomp1">
              <option value="0">Please Select Symptom 1</option>
              <?php
              if (!empty($docotr_data)) {
                foreach ($docotr_data as $value) {
              ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-3 space-between">
            <select name="symtomp2" class="form-control" id="symtomp2">
              <option value="0">Please Select Symptom 2</option>
              <?php
              if (!empty($docotr_data)) {
                foreach ($docotr_data as $value) {
              ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-3 space-between">
            <select name="symtomp3" class="form-control" id="symtomp3">
              <option value="0">Please Select Symptom 3</option>
              <?php
              if (!empty($docotr_data)) {
                foreach ($docotr_data as $value) {
              ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-3 space-between">
            <select name="symtomp4" class="form-control" id="symtomp4">
              <option value="0">Please Select Symptom 4</option>
              <?php
              if (!empty($docotr_data)) {
                foreach ($docotr_data as $value) {
              ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-3 space-between">
            <select name="symtomp5" class="form-control" id="symtomp5">
              <option value="0">Please Select Symptom 5</option>
              <?php
              if (!empty($docotr_data)) {
                foreach ($docotr_data as $value) {
              ?>
                  <option value="<?= $value ?>"><?= $value ?></option>
              <?php
                }
              }
              ?>
            </select>
          </div>

          

        </div>

        <div class="form-group col-md-4 space-between mb-3">
          <button class="btn btn-md btn-success" id="addTimingBtn">Predict</button>
        </div>
      </div>
    </div>


  </div>

  <style>
    #loading {
      position: fixed;
      display: block;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      text-align: center;
      opacity: 0.7;
      background-color: #fff;
      z-index: 99;
    }

    #loading-image {
      position: absolute;
      top: 100px;
      left: 240px;
      z-index: 100;
    }
  </style>
  <div id="loading" style="display: none;">
    <img id="loading-image" src="../assets/images/icons/1490.gif" height="50%" width="50%" alt="Loading..." />
  </div>

<?php
  require 'footer.php';
} else {
  header("Location:../user-login.php");
}
?>
<script>
  $("#addTimingBtn").click(() => {
    symp1 = document.getElementById("symtomp1").value;
    symp2 = $("#symtomp2").val();
    // console.log(symp1);
    symp3 = $("#symtomp3").val();
    symp4 = $("#symtomp4").val();
    symp5 = $("#symtomp5").val();
    type_inp = $("#type_inp").val();
    if (symp1 !=0 && symp2 !=0) {
      $.ajax({
        type: "POST",
        url: "../api/external_api.php",
        data: {
          "symptom": {
            "symp1": symp1,
            "symp2": symp2,
            "symp3": symp3,
            "symp4": symp4,
            "symp5": symp5
          },
          // "type": type_inp,
          "type": 1,
          'action': 1,
        },
        dataType: 'JSON',
        cache: false,
        beforeSend: function() {
          $('#loading').show();
        },
        success: function(response) {
          $('#loading').hide();
          $("#finalSbtBtn").removeAttr('disabled', 'disabled');
          if (response.status == 1) {
            swal("", "PREDICTED SYMPTOM : \"" + (response.data).toUpperCase() + "\"", "success");
          } else {
            swal("error", response.data, "error");
          }
        }
      });
    } else {
      swal("error", "Plaease select Atleast 2 symptoms", "info");
    }

  })

  function swal(tittle, text, icon) {
    Swal.fire({
      title: tittle,
      text: text,
      icon: icon,
    });
  }
</script>