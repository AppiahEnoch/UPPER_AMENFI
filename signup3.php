
<?php
include "checkReg2.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="AECleanCodes" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
      integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <title>Sign In</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
          inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      #error_message{
    font-size: small !important;
}
    </style>

    <!-- Custom styles for this template -->
    <link href="index1.css" rel="stylesheet" />
  </head>
  <body class="text-center">
    <script>
      var username = "";
      var password = "";
      var confirmP = "";

      $(document).ready(function () {
        $("#show_password").click(function () {
          var passwordInput = $("#tf_password");
          var passwordType = passwordInput.attr("type");
          var toggleIcon = $(this).find(".fa");

          if (passwordType === "password") {
            passwordInput.attr("type", "text");
            toggleIcon.removeClass("fa-eye-slash").addClass("fa-eye");
          } else {
            passwordInput.attr("type", "password");
            toggleIcon.removeClass("fa-eye").addClass("fa-eye-slash");
          }
        });

        $("#show_confirm").click(function () {
          var passwordInput = $("#tf_confirm");
          var passwordType = passwordInput.attr("type");
          var toggleIcon = $(this).find(".fa");

          if (passwordType === "password") {
            passwordInput.attr("type", "text");
            toggleIcon.removeClass("fa-eye-slash").addClass("fa-eye");
          } else {
            passwordInput.attr("type", "password");
            toggleIcon.removeClass("fa-eye").addClass("fa-eye-slash");
          }
        });

        $("#form").submit(function (e) {
          e.preventDefault();

          if ($("#codeHide").is(":visible")) {
          }
      
          showSpin();
          getInput();

          if (!validatePassword(password)) {
            showAEMerror("WEAK PASSWORD!", " PROVIDE STRONGER PASSWORD");
            return
          }


          if(!(passwordConfirm(password,confirmP))){
            showAEMerror("PASSWORD MISMATCH!");
            return
          }

          isUsernameAvail();



        });

        $("#tf_password").keyup(function () {
          getInput();

          if (!validatePassword(password)) {
            var m =
              "must be at least 8 characters long " +
              " and contains at least one lowercase letter, one " +
              "uppercase letter, one number, and one special character";
            showErrorText(m);
          }
          else{
            hideErrorText('');
          }
        });

        $("#tf_confirm").keyup(function () {
          getInput();

          if (!validatePassword(password)) {
            var m =
              "must be at least 8 characters long " +
              " and contains at least one lowercase letter, one " +
              "uppercase letter, one number, and one special character";
            showErrorText(m);

            return
          }
          else{
            hideErrorText('');
           
          }

          if(!(passwordConfirm(password,confirmP))){
            showErrorText("Password Mismatch")
            return
          }
          else{
            hideErrorText('')
          }




        });

        $("#myModal").on("click", "#btResend", function (e) {});

        $("#aeMsuccessw").on("hidden.bs.modal", function () {
          openPageReplace("index.php");
        });

        $("#aeMerror").on("hidden.bs.modal", function () {
          hideSpin();
        });
      });
    </script>

    <main class="form-signin w-100 m-auto">
      <form id="form">
        <img
          id="logo"
          class="mb-4"
          src="image/logo.jpg"
          alt=""
          width="72"
          height="57"
        />

        <div class="col w-100 m-2 bg-light p-2">
          <h1 id="please_signin" class="h3 mb-3 fw-normal">Login Details</h1>

          <div class="form-floating mb-1">
            <input
              type="text"
              class="form-control"
              id="tf_username"
              placeholder="username"
              required
            />
            <label for="floatingInput">Username</label>
          </div>

          <div class="form-floating mb-0">
            <input
              type="password"
              class="form-control"
              id="tf_password"
              placeholder="Password"
              required
            />
            <label for="floatingPassword">Password</label>
            <a id="show_password">
              <i class="fa fa-eye-slash" aria-hidden="true"></i>
            </a>
          </div>

          <div class="form-floating mb-0">
            <input
              type="password"
              class="form-control"
              id="tf_confirm"
              placeholder="Confirm Password"
              required
            />
            <label for="tf_confirm">Confirm Password</label>
            <a id="show_confirm">
              <i class="fa fa-eye-slash" aria-hidden="true"></i>
            </a>
          </div>

          <label id="error_message"> Password Mismatch! </label>

          <button id="submit" class="w-100 btn btn-lg" type="submit">
            Submit
            <i id="" class="fas fa-spinner fa-pulse"></i>
          </button>
          <div id="signup" class="row">
            <span> &nbsp; <a id="a_login" href="index.php"> Login</a></span>
          </div>
        </div>

        <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
      </form>
    </main>

    <!-- BEGIN  MODALS-->

    <div id="aeMsuccess" class="modal fade" tabindex="-3">
      <div class="modal-dialog" style="width: 20rem">
        <div class="modal-content">
          <div id="aeMsucces" class="modal-header">
            <h5 id="aeAlertTitle" class="modal-title">SUCCESS!</h5>
            <i
              style="color: white; margin-left: 1rem"
              class="fa fa-check-circle fa-2x"
              aria-hidden="true"
            ></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div style="background-color: white; color: black" class="modal-body">
            <h6 id="aeAlertBody">ACTION PERFORMED SUCCESSFULLY.</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- END  MODALS-->

    <!-- BEGIN  MODALS-->

    <div id="aeMsuccessw" class="modal fade" tabindex="-3">
      <div class="modal-dialog" style="width: 20rem">
        <div class="modal-content">
          <div id="aeMsuccesw" class="modal-header">
            <h5 id="aeAlertTitlew" class="modal-title">SUCCESS!</h5>
            <i
              style="color: white; margin-left: 1rem"
              class="fa fa-check-circle fa-2x"
              aria-hidden="true"
            ></i>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div style="background-color: white; color: black" class="modal-body">
            <h6 id="aeAlertBodyw">ACTION PERFORMED SUCCESSFULLY.</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- END  MODALS-->

    <!-- BEGIN  MODALS-->

    <div id="aeMerror" class="modal fade" tabindex="-3">
      <div class="modal-dialog" style="width: 20rem">
        <div class="modal-content">
          <div id="aeMerro" class="modal-header">
            <h5 id="aeMerrorTitle" class="modal-title">ERROR!</h5>
            <i
              style="color: white; margin-left: 1rem"
              class="fa fa-exclamation-triangle"
              aria-hidden="true"
            ></i>

            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div style="background-color: white; color: black" class="modal-body">
            <h6 id="aeMerrorBody">PLEASE TRY AGAIN.</h6>
          </div>
        </div>
      </div>
    </div>

    <!-- END  MODALS-->

    <!-- BEGIN AEMODEL-->
    <div id="aeMyesNo" class="modal" tabindex="-1">
      <div
        id="aeMyesN"
        style="max-width: 20rem; background-color: gray"
        class="modal-dialog"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="aeMTitle" class="modal-title">
              <strong>CONFIRM ACTION!</strong>
            </h5>
          </div>
          <div class="modal-body">
            <p style="font-weight: bold">
              <span id="aeMBody"> Do you want to perform this action? </span>
            </p>
          </div>

          <div class="modal-footer">
            <div class="row">
              <div class="col-6">
                <button id="aeMyesNoBt" type="button" class="btn btn-danger">
                  Yes
                </button>
              </div>
              <div class="col-6">
                <button
                  id="btClose"
                  type="button"
                  class="btn btn-primary"
                  data-bs-dismiss="modal"
                >
                  No
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END AEMODEL-->

    <script>
      function myAjax1() {
        $.ajax({
          type: "post",
          data: {
            id: id,
          },
          cache: false,
          url: "",
          dataType: "text",
          success: function (data, status) {
            //alert(data);
          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });
      }

      function insertDetails() {
        $.ajax({
          type: "post",
          data: {
            username: username,
            password:password
          },
          cache: false,
          url: "insertSignUp3.php",
          dataType: "text",
          success: function (data, status) {
            if(data==1){

              showAEMsuccessw("CONGRATULATIONS! YOU HAVE COMPLETED " +
             "YOUR REGISTRATION SUCCESSFULLY! REMEMBER TO USE YOUR " +
              "USERNAME AND PASSWORD TO LOGIN");
            }
           

          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });
      }

      function isUsernameAvail() {
        $.ajax({
          type: "post",
          data: {
            username: username,
          },
          cache: false,
          url: "selectUserName2.php",
          dataType: "text",
          success: function (data, status) {

            if(data==1){
              showAEMerror("CHANGE YOUR USERNAME")
              $("#tf_username").val('')
              return
            }


            insertDetails();


           
          },
          error: function (xhr, status, error) {
             alert(error);
          },
        });
      }

      function getInput() {
        username = $("#tf_username").val();
        password = $("#tf_password").val();
        confirmP = $("#tf_confirm").val();

        username = trimV(username);
        password = trimV(password);
        confirmP = trimV(confirmP);
      }

      function validate_mobile_g(mobile) {
        var phoneRe = /^[0-9]{10}$/;
        var digits = mobile.replace(/\D/g, "");
        return phoneRe.test(digits);
      }

      const validateEmail = (email) => {
        return String(email)
          .toLowerCase()
          .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          );
      };

      function aeEmpty(e) {
        var ee = "";
        try {
          ee = e.trim();
        } catch (error) {
          return true;
        }
        try {
          switch (e) {
            case "":
            case 0:
            case "0":
            case null:
            case false:
            case undefined:
              return true;
            default:
              return false;
          }
        } catch (error) {
          return true;
        }
      }

      function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
      }

      function showErrorText(message) {
        $("#error_message").text(message);
        $("#error_message").show();
      }

      function hideErrorText() {
        $("#error_message").text("");
        $("#error_message").hide();
      }

      function showSpin() {
        $("#spin").show();
      }
      function hideSpin() {
        $("#spin").hide();
      }

      function openPage_blank(url) {
        window.open(url, "_blank");
      }
      function openPage(url) {
        window.open(url);
      }

      function showAEMsuccess(aeBody, aeTitle) {
        if (!aeEmpty(aeTitle)) {
          $("#aeAlertTitle").text(aeTitle);
        }

        if (!aeEmpty(aeBody)) {
          $("#aeAlertBody").text(aeBody);
        }
        $("#aeMsuccess").modal("show");
      }

      function showAEMsuccessw(aeBody, aeTitle) {
        if (!aeEmpty(aeTitle)) {
          $("#aeAlertTitlew").text(aeTitle);
        }

        if (!aeEmpty(aeBody)) {
          $("#aeAlertBodyw").text(aeBody);
        }
        $("#aeMsuccessw").modal("show");
      }

      function showAEMerror(aeBody, aeTitle) {
        if (!aeEmpty(aeTitle)) {
          $("#aeMerrorTitle").text(aeTitle);
        }

        if (!aeEmpty(aeBody)) {
          $("#aeMerrorBody").text(aeBody);
        }
        $("#aeMerror").modal("show");
      }

      function showMYesNo(aeBody) {
        if (!aeEmpty(aeBody)) {
          $("#aeMBody").text(aeBody);
        }
        $("#aeMyesNo").modal("show");
      }

      function passwordConfirm(a, b) {
        return a == b;
      }

      function trimV(a) {
        try {
          a = a.trim();
        } catch (error) {}
        return a;
      }

      function refreshPage() {
        location.reload();
      }

      function showCodeField() {
        $("#codeHide").show();
      }
      function hideCodeField() {
        $("#codeHide").hide();
      }

      function validateGhanaCard(ghanaCard) {
        if (aeEmpty(ghanaCard)) {
          return false;
        }
        ghanaCard = ghanaCard.toUpperCase();
        var i = ghanaCard.length;

        if (i < 8) {
          return false;
        }

        if (i > 20) {
          return false;
        }

        ii = ghanaCard.substring(0, 4);

        if (!passwordConfirm(ii, "GHA-")) {
          return false;
        }

        return true;
      }

      function openPageReplace(url) {
        location.href = url;
      }

      function validatePassword(password) {
        var passwordRegex =
          /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
          var m =
              "must be at least 8 characters long " +
              " and contains at least one lowercase letter, one " +
              "uppercase letter, one number, and one special character";

        return passwordRegex.test(password);
      }


    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
