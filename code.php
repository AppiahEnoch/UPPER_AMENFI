<?php
include "checkAdmin.php";
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

    <title>Upper Amenfi Rural Bank</title>

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
    </style>

    <!-- Custom styles for this template -->
    <link href="code.css" rel="stylesheet" />
  </head>
  <body class="d-flex flex-column h-100">
    <script>
      var mobile = "";
      var username = "";
      var old_password = "";
      var new_password = "";
      var confirmPassword = "";
      var code = "";
      var email = "";
      var emailUserName = "";

      var adminMobile = "";
      var adminEmail = "";

      $(document).ready(function () {
        $("#show_password").click(function () {
          var passwordInput = $("#tf_new_password");
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

        hideSpin();
        $("#form").submit(function (e) {
          showSpin();
          e.preventDefault();
          getInput();

          if (!validate_mobile_g(adminMobile)) {
            showAEMerror("INVALID MOBILE NUMBER");
            hideSpin();
            return;
          }

          if (!validateEmail(adminEmail)) {
            showAEMerror("INVALID Email");
            hideSpin();
            return;
          }

          if (!passwordConfirm(new_password, confirmPassword)) {
            showAEMerror("PASSWORD MISMATCH!");

            hideSpin();
            return;
          }

          checkOldCode();
        });

        $("#ll2").click(function () {
          showMYesNo(
            "DO YOU WANT TO DELETE ALL RECORDS IN THE SYSTEM?" +
              " NB: YOU CANNOT UNDO THIS ACTION ONCE IT IS DONE."
          );
        });

        $("#generate_code").click(function () {
          showSpin();
          getInput();
          if (!validate_mobile_g(mobile)) {
            showAEMerror("INVALID MOBILE NUMBER");
            hideSpin();
            return;
          }

          generateCode();
        });

        $("#aeMyesNo").on("click", "#aeMyesNoBt", function (e) {
          $("#aeMyesNo").modal("hide");
          showMYesNod(
            "Are you sure you want to delete all records from the system? NB: you CANNOT UNDO this action"
          );
        });

        $("#aeMsuccess").on("hidden.bs.modal", function () {
          refreshPage();
        });

        $("#aeMerror").on("hidden.bs.modal", function () {
          hideSpin();
        });

        $("#aeMyesNod").on("click", "#aeMyesNoBtd", function (e) {
          $("#aeMyesNod").modal("hide");
          deleteAll();
        });
      });
    </script>

    <header>
      <!-- Fixed navbar -->
      <nav
        id="nav1"
        class="navbar navbar-expand-md navbar-brand fixed-top w-100 m-0"
      >
        <div class="container-fluid">
          <img id="logo" class="navbar-brand" src="image/logo.jpg" alt="" />
          <button
            id="hambergerButton"
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon bg-light"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a href="index.php" id="logout" class="nav-link"> Log out</a>
              </li>
              <li class="nav-item">
                <a id="ll1" class="nav-link" href="adminpage.php">
                  <i class="fa fa-" aria-hidden="true"></i>
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  Go Back</a
                >
              </li>
              <li class="nav-item">
                <a id="ll2" class="nav-link">
                  <i class="fa fa-" aria-hidden="true"></i>

                  Empty System</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->

    <div class="container mt-5">
      <div class="row mt-5 m-lg-5">
        <div class="col-lg-6 col-md-12">
          <div class="card m-5 mb-0">
            <div class="col">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label style="font-weight: bold" id="lb_code"> Code</label>
                    <input
                      placeholder="User Mobile e.g. 0553204053"
                      id="tf_code"
                      type="tel"
                      pattern="[0-9]{10}"
                      class="form-control"
                      id="inputText"
                    />
                  </div>
                  <button
                    id="generate_code"
                    type="button"
                    class="btn btn-primary"
                  >
                    Generate Code
                    <i id="spin" class="fas fa-spinner fa-pulse"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-12">
          <div class="card m-5">
            <div class="col">
              <div class="card-body">
                <form id="form">
                  <i
                    style="color: #271770"
                    id="spin"
                    class="fa fa-unlock fa-2x"
                  ></i>
                  <div class="col">
                    <div class="form-group mb-2">
                      <input
                        placeholder="User Mobile e.g. 0553204053"
                        id="tf_mobile"
                        type="text"
                        class="form-control"
                        required
                      />
                    </div>

                    <div class="form-group mb-2">
                      <input
                        placeholder="Email e.g. name@gmail.com"
                        id="tf_email"
                        type="email"
                        class="form-control"
                        required
                      />
                    </div>

                    <div class="form-group mb-2">
                      <input
                        placeholder="New username"
                        id="tf_username"
                        type="text"
                        class="form-control"
                        required
                      />
                    </div>

                    <div class="form-group mb-2">
                      <input
                        placeholder="Old password"
                        id="tf_old_password"
                        type="text"
                        class="form-control"
                        required
                      />
                    </div>

                    <div class="form-group mb-2">
                      <input
                        placeholder="New password"
                        id="tf_new_password"
                        type="password"
                        class="form-control"
                        required
                      />
                      <a id="show_password">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                      </a>
                    </div>

                    <div class="form-group mb-2">
                      <input
                        placeholder="Confirm password"
                        id="tf_confirm"
                        type="password"
                        class="form-control"
                        required
                      />
                      <a id="show_confirm">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                  <button
                    id="bt_reset_password"
                    type="submit"
                    class="btn btn-primary"
                  >
                    Reset password
                    <i id="spin2" class="fas fa-spinner fa-pulse"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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

    <!-- BEGIN AEMODEL-->
    <div id="aeMyesNod" class="modal" tabindex="-1">
      <div
        id="aeMyesNd"
        style="max-width: 20rem; background-color: gray"
        class="modal-dialog"
      >
        <div class="modal-content">
          <div class="modal-header bg-danger text-bg-danger">
            <h5 id="aeMTitled" class="modal-title">
              <strong>CONFIRM DELETE ACTION!</strong>
            </h5>
          </div>
          <div class="modal-body">
            <p style="font-weight: bold; color: red">
              <span id="aeMBodyd"> Do you want to perform this action? </span>
            </p>
            <i
              style="color: red"
              class="fa fa-trash fa-2x"
              aria-hidden="true"
            ></i>
          </div>

          <div class="modal-footer">
            <div class="row">
              <div class="col-6">
                <button
                  id="aeMyesNoBtd"
                  type="button"
                  class="btn btn-danger text-bg-danger"
                >
                  Yes
                </button>
              </div>
              <div class="col-6">
                <button
                  id="btClose"
                  type="button"
                  class="btn btn-primary text-bg-danger"
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

    <footer id="myFooter" class="py-3 fixed-bottom">
      <div class="container">
        <span class="text-muted">&COPY;2022 All rights reserved</span>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

    <script>
      function showAEMsuccess(aeBody, aeTitle) {
        if (!aeEmpty(aeTitle)) {
          $("#aeAlertTitle").text(aeTitle);
        }

        if (!aeEmpty(aeBody)) {
          $("#aeAlertBody").text(aeBody);
        }
        $("#aeMsuccess").modal("show");
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

      function showMYesNod(aeBody) {
        if (!aeEmpty(aeBody)) {
          $("#aeMBodyd").text(aeBody);
        }
        $("#aeMyesNod").modal("show");
      }
    </script>

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
      function deleteAll() {
        $.ajax({
          type: "post",
          data: {},
          cache: false,
          url: "deleteSystem.php",
          dataType: "text",
          success: function (data, status) {
            if (data == 1) {
              showAEMsuccess("ALL RECORDS DELETED SUCCESSFULLY!");
            } else {
              showAEMerror("COULD NOT DELETE RECORDS");
            }
          },
          error: function (xhr, status, error) {
          //  alert(error);
          },
        });
      }

      function checkOldCode() {
        $.ajax({
          type: "post",
          data: {
            mobile: adminMobile,
            password: old_password,
          },
          cache: false,
          url: "selectAdminOldCode.php",
          dataType: "text",
          success: function (data, status) {
            if (!(data == 1)) {
              showAEMerror("Wrong Old Password");
              $("#tf_old_password").val("");
              return;
            }

            isUserNameTaken();
          },
          error: function (xhr, status, error) {
           // alert(error);
          },
        });
      }

      function isUserNameTaken() {
        $.ajax({
          type: "post",
          data: {
            username: username,
            mobile: adminMobile,
          },
          cache: false,
          url: "selectUserName.php",
          dataType: "text",
          success: function (data, status) {
            // alert("d: "+data)
            if (data == 1) {
              showAEMerror("PLEASE ENTER DIFFERENT USERNAME.");
              username = $("#tf_username").val("");
              return;
            }
            if (data == 2) {
              showAEMerror("PLEASE ENTER DIFFERENT MOBILE NUMBER.");
              adminMobile = $("#tf_mobile").val("");
              return;
            }

            insertPassword();
          },
          error: function (xhr, status, error) {
            // alert(error);
          },
        });
      }

      function insertPassword() {
        $.ajax({
          type: "post",
          data: {
            mobile: adminMobile,
            email: adminEmail,
            username: username,
            password: new_password,
          },
          cache: false,
          url: "insertAdminPassword.php",
          dataType: "text",
          success: function (data, status) {
            showAEMsuccess("PASSWORD RESET MADE SUCCESSFULLY!");
          },
          error: function (xhr, status, error) {
            showAEMerror("COULD NOT RESET YOUR PASSWORD.");

            //alert(error);
          },
        });
      }

      function generateCode() {
        $.ajax({
          type: "post",
          data: {
            mobile: mobile,
          },
          cache: false,
          url: "generateCode.php",
          dataType: "text",
          success: function (data, status) {
            $("#lb_code").text(data);
            getCode();
          },
          error: function (xhr, status, error) {
          //  alert(error);
          },
        });
      }

      function getCode() {
        $.ajax({
          type: "post",
          data: {
            mobile: mobile,
          },
          cache: false,
          url: "getAuthCode.php",
          dataType: "text",
          success: function (data, status) {
          
            var output = data.split("|");

            code = output[0];
            email = output[1];
            emailUserName = output[2];

            if(( emailUserName.length)<3){
              emailUserName="NEW USER";
            }
         
      
          //   alert(data)


            // alert("outPut :"+code)

            if (aeEmpty(email)) {
              showAEMerror("COULD NOT SEND CODE. USER HAS NOT REGISTERED");
            }

            sendEmailVCode();
          },
          error: function (xhr, status, error) {
            alert(error);
          },
        });
      }

      function sendEmailVCode() {
        var receiver = email;
    
        var username1 = emailUserName;
        var subject = "USER REGISTRATION CODE";
        var sendingCode = code;

        var htmlFile = "verifyEmailRegCode.html";

       //  alert("username:"+username1)
        // alert("code:"+sendingCode)
        // alert("rec: "+receiver)
      

        $.ajax({
          type: "post",
          data: {
            subject: subject,
            username: username1,
            receiver: receiver,
            code: sendingCode,
            htmlFile: htmlFile,
          },
          cache: false,
          url: "verifyEmail.php",
          dataType: "text",
          success: function (data, status) {
            hideSpin();
            // alert(data)
            if (aeEmpty(data)) {
              showAEMerror("COULD NOT SEND CODE. EMAIL DOES NOT EXIST");

              return;
            }

            showAEMsuccess("CODE HAS BEEN SENT SUCCESSFULLY TO " + email);
          },
          error: function (xhr, status, error) {
          
          //  alert(error);
          },
        });
      }

      function getInput() {
        mobile = $("#tf_code").val();
        username = $("#tf_username").val();
        old_password = $("#tf_old_password").val();
        new_password = $("#tf_new_password").val();
        confirmPassword = $("#tf_confirm").val();
        adminEmail = $("#tf_email").val();
        adminMobile = $("#tf_mobile").val();

        adminMobile = trimV(adminMobile);
        mobile = trimV(mobile);
        username = trimV(username);
        old_password = trimV(old_password);
        new_password = trimV(new_password);
        confirmPassword = trimV(confirmPassword);
        adminEmail = trimV(adminEmail);
        adminMobile = trimV(adminMobile);
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
        $("#spin2").show();
      }
      function hideSpin() {
        $("#spin").hide();
        $("#spin2").hide();
      }

      function openPage_blank(url) {
        window.open(url, "_blank");
      }
      function openPage(url) {
        window.open(url);
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
  </body>
</html>
