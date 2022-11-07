<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/health-declaration.css" rel="stylesheet">
  <title>Health Dash Form</title>
</head>

<body>
  <div class="container">
    <h1>HEALTH DECLARATION FORM</h1>
    <div class="greetings" style="text-align: justify;">
      <p>
        Good day!
        <br>
        A declaration of health monitoring is necessary to safeguard the health and safety of all of our stakeholders at Lj Cura Ob-Gyn Ultrasound Clinic, including patients, and companions. We kindly ask everyone to complete the form completely and honestly. Make certain that the data is correct and comprehensive. If you have any of the COVID-19 symptoms, please seek emergency medical assistance.
      </p>
    </div>
    <div class="forms">
      <form id="health_form">
        <label for="" class="form-label fw-bold">Name</label>
        <input type="text" name="name" class="form-control" required>
        <label for="" class="form-label fw-bold">Address</label>
        <textarea name="address" rows="2" class="form-control" required></textarea>

        <br>
        <br>

        <!-- <label for="" class="form-label fw-bold mr-3">Choose One</label>
        <input type="radio" id="is_patient1" name="is_patient" value="Patient" checked>
        <label for="is_patient1">Patient</label>
        <input type="radio" id="is_patient2" name="is_patient" value="Companion">
        <label for="is_patient2">Companion</label>

        <br>
        <br> -->

        <label for="" class="form-label fw-bold">Health Status</label>

        <p>Are you experiencing? (nakakaranas ka ba ng?)</p>
        <input type="checkbox" name="is_fever" id="is_fever">
        <label for="is_fever">Fever for the past few days (lagnat sa nakalipas na mga araw)</label> <br>
        <input type="checkbox" name="is_cough" id="is_cough">
        <label for="is_cough">Cough/Colds (Ubo/Sipon)</label> <br>
        <input type="checkbox" name="is_loss_smell" id="is_loss_smell">
        <label for="is_loss_smell">Loss of smell (Pagkawala ng pang-amoy)</label> <br>
        <input type="checkbox" name="is_short_breath" id="is_short_breath">
        <label for="is_short_breath">Shortness of Breath/Difficulty of Breathing (Hirap ng Paghinga)</label> <br>
        <input type="checkbox" name="is_sore_throat" id="is_sore_throat">
        <label for="is_sore_throat">Sore throat (Pananakit ng lalamunan)</label> <br>
        <input type="checkbox" name="is_body_pain" id="is_body_pain">
        <label for="is_body_pain">Body Pains (Pananakit ng katawan)</label> <br>
        <input type="checkbox" name="is_headache" id="is_headache">
        <label for="is_headache">Headache (Pananakit ng ulo)</label>

        <br>
        <br>


        <label for="" class="form-label">Have you had a companion/family member who has symptoms of COVID-19? (Ikaw ba ay may kasama sa bahay na may sintomas ng COVID-19?)</label>
        <input type="radio" id="yes1" name="is_fam_covid" value="Yes">
        <label for="yes1">Yes</label>
        <input type="radio" id="no2" name="is_fam_covid" value="No" checked>
        <label for="no2">No</label>

        <br>
        <br>

        <label for="" class="form-label">Have you had any contact with anyone with COVID-19 symptoms on the past 14 days? (Ikaw ba ay nag-alaga ng pasyente o may nakasalamuha na may COVID-19 o anumang sintomas nito sa nagdaang 14 na araw?)</label>
        <input type="radio" id="yes11" name="is_contact_covid" value="Yes">
        <label for="yes11">Yes</label>
        <input type="radio" id="no22" name="is_contact_covid" value="No" checked>
        <label for="no22">No</label>

        <br>
        <br>

        <label for="" class="form-label">Have you travelled to any area outside Batangas Province on the past 14 days? (Ikaw ba ay nagbyahe sa labas ng Probinsya ng Batangas sa nagdaang 14 na araw?)</label>
        <input type="radio" id="yes111" name="is_travelled_outside" value="Yes">
        <label for="yes111">Yes</label>
        <input type="radio" id="no222" name="is_travelled_outside" value="No" checked>
        <label for="no222">No</label>

        <br>
        <br>
        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $("#health_form").on("submit", function(e) {
      e.preventDefault();

      let name = $("input[name='name']").val();
      let address = $("textarea[name='address']").val();
      // let is_patient = $("input[name='is_patient']").val();
      let is_patient = '';

      let is_fever = $("input[name='is_fever']").prop('checked') ? 'Yes' : 'No';
      let is_cough = $("input[name='is_cough']").prop('checked') ? 'Yes' : 'No';
      let is_loss_smell = $("input[name='is_loss_smell']").prop('checked') ? 'Yes' : 'No';
      let is_short_breath = $("input[name='is_short_breath']").prop('checked') ? 'Yes' : 'No';
      let is_sore_throat = $("input[name='is_sore_throat']").prop('checked') ? 'Yes' : 'No';
      let is_body_pain = $("input[name='is_body_pain']").prop('checked') ? 'Yes' : 'No';
      let is_headache = $("input[name='is_headache']").prop('checked') ? 'Yes' : 'No';

      let is_fam_covid = $("input[name='is_fam_covid']").prop('checked') ? 'Yes' : 'No';;
      let is_contact_covid = $("input[name='is_contact_covid']").prop('checked') ? 'Yes' : 'No';;
      let is_travelled_outside = $("input[name='is_travelled_outside']").prop('checked') ? 'Yes' : 'No';;

      let data_obj = {
        name,
        address,
        is_patient,
        is_fever,
        is_cough,
        is_loss_smell,
        is_short_breath,
        is_sore_throat,
        is_body_pain,
        is_headache,
        is_fam_covid,
        is_contact_covid,
        is_travelled_outside,
      }

      // console.log(data_obj);
      $.ajax({
        method: 'POST',
        url: './functions/save_health_declaration.php',
        data: data_obj,
        success: function(res) {
          // console.log(res);
          if (res.status === false) {
            alert('Something Wrong.');
            return;
          }
          window.location = 'https://ljcultrasoundclinic.site/';
        }
      })
    });
  });
</script>